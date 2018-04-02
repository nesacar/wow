<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/positions'">Positions</router-link></li>
                            <li>Edit Position</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Edit Position</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="group">Group</label>
                                <select name="group" id="group" class="form-control" v-model="position.group">
                                    <option value="1">Horizontal banners</option>
                                    <option value="2">Banners right</option>
                                    <option value="3">Branding</option>
                                </select>
                                <small class="form-text text-muted" v-if="error != null && error.group">{{ error.group[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" v-model="position.title">
                                <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <input type="text" name="desc" class="form-control" id="desc" placeholder="Description" v-model="position.desc">
                                <small class="form-text text-muted" v-if="error != null && error.desc">{{ error.desc[0] }}</small>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import swal from 'sweetalert2';

    export default {
        data(){
          return {
              position: {},
              error: null
          }
        },
        created(){
          this.getPosition();
        },
        methods: {
            getPosition(){
                axios.get('api/positions/' + + this.$route.params.id)
                    .then(res => {
                       this.position = res.data.position;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            submit(){
                axios.put('api/positions/' + this.position.id, this.position)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$router.push('/positions');
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            }
        }
    }
</script>