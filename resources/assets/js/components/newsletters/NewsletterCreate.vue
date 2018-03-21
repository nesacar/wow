<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/newsletters'">Newsletters</router-link></li>
                            <li>Create Newsletter</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Create Newsletter</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email address" v-model="newsletter.email">
                                <small class="form-text text-muted" v-if="error != null && error.email">{{ error.email[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Block</label><br>
                                <switches v-model="newsletter.block" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <label>Select2</label><br>
                                <select2 :options="posts">
                                    <option disabled value="0">select one</option>
                                </select2>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Create</button>
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
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import Switches from 'vue-switches';
    import swal from 'sweetalert2';
    import Select2 from '../helper/Select2Helper.vue';

    export default {
        data(){
          return {
              newsletter: {},
              posts: {},
              error: null
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'switches': Switches,
            'select2': Select2,
        },
        created(){
            this.getPosts();
        },
        methods: {
            submit(){
                axios.post('api/newsletters', this.newsletter)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$router.push('/newsletters');
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getPosts(){
                axios.get('api/posts/lists')
                    .then(res => {
                        this.posts = _.map(res.data.posts, (data) => {
                            var pick = _.pick(data, 'title', 'id');
                            var object = {id: pick.id, text: pick.title};
                            return object;
                        });
                    })
                    .catch(e => {
                        console.log(e);
                    });
            }
        }
    }
</script>