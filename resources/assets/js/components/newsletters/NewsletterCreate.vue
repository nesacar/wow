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

                <div class="col-sm-4">
                    <div class="card stack">
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
                            <button class="btn btn-primary" @click="createLeading()">Leading Post</button>
                            <button class="btn btn-primary" @click="createPosts()">Two Posts</button>
                            <button class="btn btn-primary" @click="createBanner()">Banner</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">

                    <markup :items="items" @removeMarkup="removeMarkup($event)"></markup>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import Switches from 'vue-switches';
    import swal from 'sweetalert2';
    import markup from '../newsletters/builder/markup.vue';

    export default {
        data(){
          return {
              newsletter: {},
              posts: {},
              error: null,
              items: []
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'switches': Switches,
            'markup': markup,
        },
        created(){
            this.getPosts();
        },
        methods: {
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
            },
            createLeading(){
                this.items.push('leading-post');
            },
            createPosts(){
                this.items.push('two-posts');
            },
            createBanner(){
                this.items.push('banner');
            },
            removeMarkup(index){
                this.items.splice(index, 1);
                console.log('deleted: ' + index);
            },
        }
    }
</script>

<style>
    .stack{
        position: fixed;
        top: 233px;
    }
</style>