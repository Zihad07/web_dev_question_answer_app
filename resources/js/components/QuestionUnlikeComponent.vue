<template>
  <span style="cursor:pointer" @click="unlikeAction">Unlike({{ count }})</span>
</template>

<script>
export default {
    name: 'question_unlike',
    props: ['question'],
    mounted() {
        this.refresh();
    },
    data() {
        return {
             count : 0 

        }
    },
    methods: {
        unlikeAction() {
            console.log(this.like);
            console.log(this.question)
            axios.get('/question_unlike/'+this.question)
                    .then((response)=>{
                        // console.log(response.data)
                        this.count = response.data
                        // this.count(response.data);
                    }) 
                    .catch((error)=> {
                        console.log(error)
                    })

        },
        refresh() {
            axios.get('/question_unlike/refresh/'+this.question)
                    .then((response)=>{
                        // console.log(response.data)
                        this.count = response.data
                        // this.count(response.data);
                    }) 
                    .catch((error)=> {
                        console.log(error)
                    })
        }
    },
    computed: {
        // count(like) {
        //     return like
        // }
    }
    
}
</script>

<style>

</style>