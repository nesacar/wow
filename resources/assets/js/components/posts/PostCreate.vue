<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/posts'">Posts</router-link></li>
                            <li>Post create</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Post create</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control" v-model="post.category_id">
                                    <option :value="index" v-for="(category, index) in lists">{{ category }}</option>
                                </select>
                                <small class="form-text text-muted" v-if="error != null && error.category_id">{{ error.category_id[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="town">Town</label>
                                <select name="town" id="town" class="form-control" v-model="post.town_id">
                                    <option :value="index" v-for="(town, index) in towns">{{ town }}</option>
                                </select>
                                <small class="form-text text-muted" v-if="error != null && error.town_id">{{ error.town_id[0] }}</small>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date">Published at</label>
                                        <input type="date" name="title" class="form-control" id="date" placeholder="Published at" v-model="post.date">
                                        <small class="form-text text-muted" v-if="error != null && error.publish_at">{{ error.publish_at[0] }}</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="time">&nbsp;</label>
                                        <input type="time" name="title" class="form-control" id="time" placeholder="Published at" v-model="post.time">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" v-model="post.title" @change="titleChange()">
                                <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" v-model="post.slug">
                                <small class="form-text text-muted" v-if="error != null && error.slug">{{ error.slug[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="short">Short</label>
                                <!--<textarea name="short" id="short" cols="3" rows="4" class="form-control" placeholder="Short" v-model="post.short"></textarea>-->
                                <ckeditor
                                        v-model="post.short"
                                        :config="config_short">
                                </ckeditor>
                                <small class="form-text text-muted" v-if="error != null && error.short">{{ error.short[0] }}</small>
                            </div>
                            <div class="form-group">
                                    <label>Body</label>
                                <ckeditor
                                        v-model="post.body"
                                        :config="config_body">
                                </ckeditor>
                                <small class="form-text text-muted" v-if="error != null && error.body">{{ error.body[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="map">Map</label>
                                <textarea name="short" id="map" cols="3" rows="4" class="form-control" placeholder="Map" v-model="post.map"></textarea>
                                <small class="form-text text-muted" v-if="error != null && error.map">{{ error.map[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Slider</label><br>
                                <switches v-model="post.slider" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <label>Widget</label><br>
                                <switches v-model="post.widget" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <label>Publish</label><br>
                                <switches v-model="post.publish" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select2 :options="tags" :multiple="true" @input="input($event)">
                                    <option value="0" disabled>select one</option>
                                </select2>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <upload-image-helper
                            :image="post.image"
                            :defaultImage="null"
                            :titleImage="'Post'"
                            :error="error"
                            @uploadImage="upload($event)"
                            @removeRow="remove($event)"
                    ></upload-image-helper>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { apiHost } from '../../config';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import UploadImageHelper from '../helper/UploadImageHelper.vue';
    import UploadPdfHelper from '../helper/UploadPdfHelper.vue';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';
    import Ckeditor from 'vue-ckeditor2';
    import Select2 from '../helper/Select2Helper.vue';
    import moment from 'moment';

    export default {
        data(){
          return {
              post: {
                  date: moment().format('YYYY-MM-DD'),
                  time: moment().format('HH:mm'),
                  slug: null,
                  desc: null,
                  publish: false,
                  category_id: 0,
                  tags: []
              },
              lists: {},
              towns: {},
              tags: {},
              error: null,
              config_short: {
                  toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image', 'Link', 'Unlink', 'Source', 'Media Embed' ],
                      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      '/',
                      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                  ],
                  height: 300,
                  filebrowserBrowseUrl: 'filemanager/show',
                  enterMode: CKEDITOR.ENTER_BR,
                  shiftEnterMode: CKEDITOR.ENTER_P, //pressing the SHIFT + ENTER KEYS input <p>
                  autoParagraph: false // stops automatic insertion of <p> on focus
              },
              config_body: {
                  toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image', 'Link', 'Unlink', 'Source', 'Media Embed' ],
                      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      '/',
                      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                  ],
                  height: 300,
                  filebrowserBrowseUrl: 'filemanager/show'
              },
              domain : apiHost
          }
        },
        computed: {
            user(){
                return this.$store.getters.getUser;
            },
            publish_at(){
                return this.post.date + ' ' + this.post.time
            }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'upload-image-helper': UploadImageHelper,
            'upload-pdf-helper': UploadPdfHelper,
            'switches': Switches,
            'ckeditor': Ckeditor,
            'select2': Select2,
        },
        created(){
            this.getList();
            this.getTowns();
            this.getTags();
        },
        methods: {
            submit(){
                this.post.publish_at = this.publish_at;
                this.post.user_id = this.user.id;
                axios.post('api/posts', this.post)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$router.push('/posts');
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            upload(image){
                console.log(image[0]);
                this.post.image = image[0];
            },
            getList(){
                axios.get('api/categories/lists')
                    .then(res => {
                        this.lists = res.data.categories;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getTowns(){
                axios.get('api/towns/lists')
                    .then(res => {
                        this.towns = res.data.towns;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            getTags(){
                axios.get('api/tags/lists')
                    .then(res => {
                        this.tags = _.map(res.data.tags, (data) => {
                            var pick = _.pick(data, 'title', 'id');
                            var object = {id: pick.id, text: pick.title};
                            return object;
                        });
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            input(tag){
                console.log(tag);
                this.post.tags = tag;
            },
            titleChange(){
                this.post.slug = Slug(this.post.title);
            }
        }
    }
</script>