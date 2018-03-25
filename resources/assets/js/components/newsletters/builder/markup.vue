<template>
    <div class="body" style="background-color:#e9e2d0;">
        <div style="background-color:#e9e2d0;">
            <div style="margin:0px auto;max-width:600px;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                    <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                                    <tr>
                                        <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                <tbody>
                                                <tr>
                                                    <td style="width:250px;"> <a href="https://www.wowmalta.com.mt/" target="_blank">

                                                        <img
                                                                alt="https://www.wowmalta.com.mt/" height="auto" src="https://www.wowmalta.com.mt/thm/malta/img/logo.png" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="250"
                                                        />

                                                    </a> </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <template v-for="(item, index) in items">
                <component :is="item.component" :index="index" :posts="posts" :banners="banners" :item="item" :edit="edit" @deleteRow="deleteRow($event)" @setItem="setItem($event)"></component>
            </template>

            <div style="Margin:0px auto;max-width:600px;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                    <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0;padding-top:0;text-align:center;vertical-align:top;">

                            <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <div style="font-family:Roboto;font-size:12px;line-height:1.5;text-align:left;color:#000000;">
                                                <p text-align="center">You have received this message because you subscribed to it on <a href="https://www.wowmalta.com.mt">https://www.wowmalta.com.mt</a>. To stop receiving this and other messages from WowMalta - Travel Info Guide for Malta, Gozo &amp;
                                                    Comino, click <a href="#">HERE</a>.</p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <button class="btn btn-primary" @click="create()" v-if="items.length > 0">Confirm</button>
            </div>

        </div>
    </div>
</template>

<script>
    import leadingPost from './leadingPost.vue';
    import twoPosts from './twoPosts.vue';
    import banner from './banner.vue';

    export default{
        data(){
          return {
              posts: {},
              banners: {},
              attrs: [],
          }
        },
        props: ['items', 'edit'],
        components: {
            'leading-post': leadingPost,
            'two-posts': twoPosts,
            'banner': banner,
        },
        created(){
            this.getPosts();
            this.getBanners();
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
            getBanners(){
                axios.get('api/banners/lists')
                    .then(res => {
                        this.banners = _.map(res.data.banners, (data) => {
                            var pick = _.pick(data, 'title', 'id');
                            var object = {id: pick.id, text: pick.title};
                            return object;
                        });
                    })
                    .catch(e => {
                        console.log(e);
                    });
            },
            deleteRow(index){
                this.attrs.splice(index, 1);
                this.$emit('removeMarkup', index);
            },
            setItem(item){
                this.attrs[item.index] = item;
            },
            create(){
                this.$emit('create', this.attrs);
            },
        }
    }
</script>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto);

    #outlook a {
        padding: 0;
    }

    .ReadMsgBody {
        width: 100%;
    }

    .ExternalClass {
        width: 100%;
    }

    .ExternalClass * {
        line-height: 100%;
    }

    .body {
        width: 600px;
        margin: 0;
        padding: 0;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    table,
    td {
        border-collapse: collapse;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
        -ms-interpolation-mode: bicubic;
    }

    p {
        display: block;
        margin: 13px 0;
    }


    a {
        color: #128a88;
        text-decoration: none;
    }

    p {
        margin-bottom: 6px;
        margin-top: 0;
    }

    h2 {
        margin: 12px 0 6px;
    }

    .heading {
        font-size: 18px;
        color: #128a88;
        text-transform: uppercase;
        font-weight: normal;
    }

    .article {
        position: relative;
    }
</style>

<style scoped>
    .btn-primary{
        display: block;
        width: 70px;
        margin-left: auto;
        margin-right: auto;
    }
</style>