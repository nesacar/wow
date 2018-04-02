<template>
    <div class="form-group">
        <input type="checkbox" id="position" placeholder="Title" v-model="position.publish" @change="check()">
        <label for="position">{{ position.desc }}</label>
    </div>
</template>

<script>
    export default {
        props: ['position'],
        methods: {
            check(){
                console.log(this.position.publish);
            }
        }
    }
</script>