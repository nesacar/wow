npm<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/categories'">Categories</router-link></li>
                            <li>Create category</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Create category</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" v-model="category.title">
                                <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" v-model="category.slug">
                                <small class="form-text text-muted" v-if="error != null && error.slug">{{ error.slug[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="order">Position in menu</label>
                                <input type="text" name="order" class="form-control" id="order" placeholder="Order" v-model="category.order">
                                <small class="form-text text-muted" v-if="error != null && error.order">{{ error.order[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="featured">Featured position</label>
                                <input type="text" name="featured" class="form-control" id="featured" placeholder="Featured" v-model="category.featured">
                                <small class="form-text text-muted" v-if="error != null && error.featured">{{ error.featured[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Map</label>
                                <ckeditor
                                        v-model="category.map"
                                        :config="config">
                                </ckeditor>
                                <small class="form-text text-muted" v-if="error != null && error.map">{{ error.map[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Publish</label><br>
                                <switches v-model="category.publish" theme="bootstrap" color="primary"></switches>
                            </div>
                            <hr>
                            <h3>SEO</h3>
                            <div class="form-group">
                                <label for="title">Seo title</label>
                                <input type="text" name="seotitle" class="form-control" id="tiseotitletle" placeholder="Title" v-model="category.seotitle">
                                <small class="form-text text-muted" v-if="error != null && error.seotitle">{{ error.seotitle[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="seokeywords">Seo keywords</label>
                                <input type="text" name="seokeywords" class="form-control" id="seokeywords" placeholder="Title" v-model="category.seokeywords">
                                <small class="form-text text-muted" v-if="error != null && error.seokeywords">{{ error.seokeywords[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Seo description</label>
                                <ckeditor
                                        v-model="category.short"
                                        :config="config">
                                </ckeditor>
                                <small class="form-text text-muted" v-if="error != null && error.short">{{ error.short[0] }}</small>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <upload-image-helper
                            :image="category.image"
                            :defaultImage="null"
                            :titleImage="'Category'"
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
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import UploadImageHelper from '../helper/UploadImageHelper.vue';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';
    import Ckeditor from 'vue-ckeditor2';

    export default {
        data(){
          return {
              category: {
                  short: null,
                  publish: false
              },
              error: null,
              config: {
                  toolbar: [
                      [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'Image', 'Link', 'Unlink', 'Source' ],
                      { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                      '/',
                      { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                  ],
                  height: 300,
                  filebrowserBrowseUrl: 'media'
              }
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'upload-image-helper': UploadImageHelper,
            'switches': Switches,
            'ckeditor': Ckeditor
        },
        methods: {
            submit(){
                axios.post('api/categories', this.category)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Uspeh',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$router.push('/categories');
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            upload(image){
                this.category.image = image[0];
            }
        }
    }
</script>