<script>
    import { Line } from 'vue-chartjs';

    export default {
        extends: Line,
        props: ['labels', 'data', 'options'],
        mounted () {
            console.log(this.labels);
            this.renderChart({
                labels: this.labels,
                datasets: [
                    {
                        label: 'GitHub Commits',
                        backgroundColor: '#008a88',
                        data: this.data
                    }
                ]
            })
        }
    }
</script>

<style scoped>
    .chartjs-render-monitor {
        width: calc(100vw - 280px);
        max-width: 800px;
    }
</style>