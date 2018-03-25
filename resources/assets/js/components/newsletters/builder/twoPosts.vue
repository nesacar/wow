<template>
    <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0;padding-top:0;text-align:center;vertical-align:top;">

                    <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                            <tbody>
                            <tr>
                                <td style="vertical-align:bottom;padding:0 0 15px;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                        <!-- article -->
                                        <<tr>
                                        <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-bottom:0;word-break:break-word;">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                <tbody>
                                                <tr>
                                                    <td style="width:250px;"> <a href="#" target="_blank">

                                                        <img alt="#" height="auto" :src="domain + 'img/newsletter-post.jpg'" style="border:0;display:block;outline:none;text-decoration:none;width:250px;" width="250" v-if="item.post1 == null" />
                                                        <img alt="#" height="auto" :src="domain + item.post1.image" style="border:0;display:block;outline:none;text-decoration:none;width:250px;" width="250" v-else />

                                                    </a> </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                        <tr>
                                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-bottom:0;word-break:break-word;">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:250px; padding-top: 20px;">

                                                            <select2 :options="posts" @input="input1($event)">
                                                                <option selected value="0">select one</option>
                                                            </select2>

                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:0px;padding:10px 25px;padding-top:0;padding-bottom:0;word-break:break-word;">
                                                <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                                    <div class="article">
                                                        <h2 class="heading" v-if="item.post1 == null">DEFAULT TITLE</h2>
                                                        <h2 class="heading" v-else>{{ item.post1.title }}</h2>
                                                        <p v-if="item.post1 == null">Default body...</p>
                                                        <p v-else>{{ item.post1.title }}</p>
                                                        <div style="text-align: right;"> <a href="">Read more &gt;</a> </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- /article -->

                    <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                            <tbody>
                            <tr>
                                <td style="vertical-align:bottom;padding:0 0 15px;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                        <!-- article -->
                                        <tr>
                                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-bottom:0;word-break:break-word;">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:250px;"> <a href="#" target="_blank">

                                                            <img alt="#" height="auto" :src="domain + 'img/newsletter-post.jpg'" style="border:0;display:block;outline:none;text-decoration:none;width:250px;" width="250" v-if="item.post2 == null" />
                                                            <img alt="#" height="auto" :src="domain + item.post2.image" style="border:0;display:block;outline:none;text-decoration:none;width:250px;" width="250" v-else />

                                                        </a> </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0;padding-bottom:0;word-break:break-word;">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:250px; padding-top: 20px;">

                                                            <select2 :options="posts" @input="input2($event)">
                                                                <option selected value="0">select one</option>
                                                            </select2>

                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:0px;padding:10px 25px;padding-top:0;padding-bottom:0;word-break:break-word;">
                                                <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                                    <div class="article">
                                                        <h2 class="heading" v-if="item.post2 == null">DEFAULT TITLE</h2>
                                                        <h2 class="heading" v-else>{{ item.post2.title }}</h2>
                                                        <p v-if="item.post2 == null">Default body...</p>
                                                        <p v-else>{{ item.post2.title }}</p>
                                                        <div style="text-align: right;"> <a href="">Read more &gt;</a> </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- /article -->

                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Select2 from '../../helper/Select2Helper.vue';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import { apiHost } from '../../../config';

    export default {
        data(){
          return {
              domain: apiHost
          }
        },
        props: ['posts', 'index', 'item'],
        components: {
            'select2': Select2,
            'font-awesome-icon': FontAwesomeIcon
        },
        methods: {
            deleteRow(index){
                this.$emit('deleteRow', index);
            },
            input1(post_id){
                if(post_id == 0){
                    this.item.post1 = null;
                    this.$emit('setItem', {type: 'post', item1: this.item.post1, item2: this.item.post2, index: this.index});
                }else{
                    axios.get('api/newsletters/' + post_id + '/post')
                        .then(res => {
                            this.item.post1 = res.data.post;
                            this.$emit('setItem', {type: 'posts', item1: this.item.post1, item2: this.item.post2, index: this.index});
                        })
                        .catch(e => {
                            console.log(e);
                        });
                }
            },
            input2(post_id){
                if(post_id == 0){
                    this.item.post2 = null;
                    this.$emit('setItem', {type: 'post', item1: this.item.post1, item2: this.item.post2, index: this.index});
                }else{
                    axios.get('api/newsletters/' + post_id + '/post')
                        .then(res => {
                            this.item.post2 = res.data.post;
                            this.$emit('setItem', {type: 'posts', item1: this.item.post1, item2: this.item.post2, index: this.index});
                        })
                        .catch(e => {
                            console.log(e);
                        });
                }
            }
        }
    }
</script>

<style scoped>
    @media only screen and (min-width:480px) {
        .mj-column-per-50 {
            width: 50% !important;
        }
    }

    svg{
        display: block !important;
        width: 25px !important;
        height: 25px !important;
        cursor: pointer;
        position: absolute;
        top: 5px;
        left: 5px;
        color: red;
    }
</style>