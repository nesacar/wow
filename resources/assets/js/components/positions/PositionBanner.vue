<template>
    <div class="form-group">
        <input type="checkbox" id="position" placeholder="Title" v-model="position.publish" @change="check()">
        <label for="position">{{ position.title }} ({{ position.desc }})</label>
        <router-link tag="a" :to="'positions/' + position.id + '/edit'" class="edit-link"><font-awesome-icon icon="pencil-alt"/></router-link>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';

    export default {
        props: ['position'],
        components: {
            'font-awesome-icon': FontAwesomeIcon,
        },
        methods: {
            check(){
                if(this.position.publish){
                    this.$emit('add', this.position.id);
                }else {
                    this.$emit('remove', this.position.id);
                }
            }
        }
    }
</script>