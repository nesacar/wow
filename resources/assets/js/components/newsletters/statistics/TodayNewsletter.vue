<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/newsletters'">Newsletters</router-link></li>
                            <li>Today</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Today</h5>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card">
                        <chart :labels="labels" :data="data"></chart>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Chart from './../../helper/ChartHelper.vue';

    export default {
        data(){
          return {
              newsletter: {},
              data: [0],
              labels: ['a']
          }
        },
        components: {
            'chart': Chart
        },
        created(){
            this.getNewsletter();
        },
        methods: {
            getNewsletter(){
                axios.get('api/newsletters/' + this.$route.params.id)
                    .then(res => {
                        //console.log(res.data.newsletter);
                        this.newsletter = res.data.newsletter;
                        this.getStatistics();
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            getStatistics(){
                axios.get('api/statistics/' + this.newsletter.id + '/today')
                    .then(res => {
                        //console.log(res.data);
                        this.data = res.data.clicks.data;
                        this.labels = res.data.clicks.labels;
//                        console.log(this.data);
//                        console.log(this.labels);
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
        }
    }
</script>

