<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li>Banner Positions</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Banner Positions</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <form @submit.prevent="submit()">
                        <div class="card">
                            <h3>Horizontal banners</h3>
                            <hr>
                            <div v-for="position in horizontal">
                                <position-banner :position="position"></position-banner>
                            </div>
                        </div>
                        <div class="card">
                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import swal from 'sweetalert2';
    import PositionBanner from './PositionBanner.vue';

    export default {
        data(){
          return {
              horizontal: {},
              error: null
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'position-banner': PositionBanner,
        },
        created(){
            this.getPositions();
        },
        methods: {
            getPositions(){
                axios.get('api/positions')
                    .then(res => {
                        this.horizontal = res.data.horizontal;
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            },
            submit(){
//                axios.post('api/banners', this.banner)
//                    .then(res => {
//                        swal({
//                            position: 'center',
//                            type: 'success',
//                            title: 'Success',
//                            showConfirmButton: false,
//                            timer: 1500
//                        });
//                        this.$router.push('/banners');
//                    }).catch(e => {
//                        console.log(e.response);
//                        this.error = e.response.data.errors;
//                    });
                console.log('submit');
            },
        }
    }
</script>