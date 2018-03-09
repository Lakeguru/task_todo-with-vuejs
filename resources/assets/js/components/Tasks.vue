<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">My Task</div>

                    <div class="card-body">
                        
                        <div class="input-group">
                            <input type="text" class="form-control" v-model="task.name" @keyup="create">
                            <span class="input-group-btn">
                            <button class="btn btn-outline-success " @click="create">Add</button>
                            </span>
                        </div>
                    </div>

                    
                    <div class="tasks-list">

                        <div class="alert alert-danger" role="alert"  v-if="!tasks.length">
                            You have no tasks today! 
                        </div>

                        <ul class="list-unstyled">
                            <li v-for="task in tasks" v-bind:key="task.id" :class="{done: task.completed }">
                                <div class="checkbox"> 
                                    <label>
                                        <input type="checkbox" v-model="task.completed" @click="done(task)">{{ task.name }}
                                        </label>
                                        <div class="float-right">
                                            <a href="#" @click.prevent="remove(task)"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                    
                </div>
                <div class="card_header" v-if="tasks.length">
                        <span class="badge badge-dark">You have {{tasks.length}} task</span>
                        <span class="badge badge-warning">{{remainingTasks()}} task left</span>
                        <span class="badge badge-success">{{completedTasks()}} tasls completed</span>
                    </div> 
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [],
      task: {
        name: '',

      }
    }

  },

  created() {
    this.fetchData();
  },

  methods: {
    remainingTasks() {
      return this.tasks.filter(task => {
        return !task.completed;
      }).length

    },
    completedTasks() {
      return this.tasks.filter(task => {
        return task.completed;
      }).length

    },
    fetchData () {
                axios.get('/api/tasks')
                        .then((res) => {
                            this.tasks = res.data
                        })
                        .catch((err) => {
                            console.log(err);
                        })
            },

    create() {
      axios
        .post('/api/tasks', this.task)
        .then(res => {
          console.log(res)

          this.tasks.unshift(res.data);
          this.task.name = ''
        })
        .catch(err => {
          console.log(err);
        });
    },

    done(task) {
      axios.put(`/api/tasks/${task.id}`, {
          completed: !task.completed
        })
        .then(res => {
          console.log("task updated");
        })

        .catch(err => {
          console.log(err);
        });
    },

    remove(task) {
      axios
        .delete(`/api/tasks/${task.id}`)
        .then(res => {
          
          const taskIndex = this.tasks.indexOf(task);
          this.tasks.splice(taskIndex, 1);
        })

        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>

<style>
body,
.tasks-list {
  padding-top: 20px;
}
.done badge {
  text-decoration: line-through;
}
</style>
   