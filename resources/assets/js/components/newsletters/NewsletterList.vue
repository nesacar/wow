<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li>Newsletters</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">title</th>
                                <th scope="col">last sent</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="row in newsletters">
                                <td>{{ row.id }}</td>
                                <td>{{ row.title }}</td>
                                <td v-if="row.last_send">{{ row.last_send }}</td> <td v-else> Never </td>
                                <td>
                                    <font-awesome-icon icon="envelope" @click="sendRow(row['id'])" v-if="row.send == 0"/>
                                    <font-awesome-icon icon="pencil-alt" @click="editRow(row['id'])"/>
                                    <font-awesome-icon icon="times" @click="deleteRow(row)" />
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <paginate-helper :paginate="paginate" @clickLink="clickToLink($event)"></paginate-helper>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PaginateHelper from '../helper/PaginateHelper.vue';
    import swal from 'sweetalert2';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';

    export default {
        data(){
            return {
                newsletters: {},
                paginate: {}
            }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon
        },
        created(){
            this.getNewsletters();
        },
        methods: {
            getNewsletters(){
                axios.get('api/newsletters')
                    .then(res => {
                        this.newsletters = res.data.newsletters.data;
                        this.columns = res.data.columns;
                        this.paginate = res.data.newsletters;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            editRow(id){
                this.$router.push('newsletters/' + id + '/edit');
            },
            deleteRow(row){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#51d2b7',
                    cancelButtonColor: '#fb9678',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('api/newsletters/' + row.id)
                            .then(res => {
                                this.newsletters = this.newsletters.filter(function (item) {
                                    return row.id != item.id;
                                });
                                swal(
                                    'Deleted!',
                                    'Newsletter is deleted.',
                                    'success'
                                );
                            })
                            .catch(e => {
                                console.log(e);
                            });
                    }
                });
            },
            clickToLink(index){
                axios.get('api/newsletters?page=' + index)
                    .then(res => {
                        this.newsletters = res.data.newsletters.data;
                        this.paginate = res.data.newsletters;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            sendRow(index){
                console.log(index);
                axios.post('api/newsletters/' + index + '/send')
                    .then(res => {
                        swal(
                            'Send!',
                            'Newsletter was sent.',
                            'success'
                        );
                    })
                    .catch(e => {
                        console.log(e);
                    });
            }
        }
    }
</script>