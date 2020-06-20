<template>
    <span>
        <span class="separator">|</span>
        <span style="cursor:pointer;" @click="likeAction">Like({{ like }})</span>
        <span class="separator">|</span>
        <span style="cursor:pointer;" @click="unlikeAction">Unlike({{ unlike }})</span>
    </span>
</template>

<script>
    export default {
        props : ['question','like','unlike'],
        mounted() {
            // console.log('Component mounted.')

            this.refreshLike();
            this.refreshUnlike();
        },

        data: function(){
            return  {
                // like : 0,
                // unlike: 0
            }
        },
        methods: {
            action(url) {
                // console.log("Like : "+this.like);
                // console.log("QuestionID : " + this.question);
                axios.get(url)
                    .then((response)=>{
                        // console.log(response.data);
                        // this.count = response.data
                        // this.count(response.data);
                        this.refreshLike();
                        this.refreshUnlike();
                    })
                    .catch((error)=> {
                        console.log(error)
                    })
            },
            refreshAction(url, status=null) {
                axios.get(url)
                    .then((response)=>{
                        // console.log(response.data);
                        if(status == 'like'){
                            this.like = response.data;
                        }
                        if(status == 'unlike') {
                            this.unlike = response.data;
                        }

                        // this.count(response.data);
                    })
                    .catch((error)=> {
                        console.log(error)
                    })
            },
            likeAction() {
                const url = `/question_like/${this.question}`;
                this.action(url);
            },
            unlikeAction() {
                const url = `/question_unlike/${this.question}`;
                this.action(url);
            },

            refreshLike() {
                const url = `/question_like/refresh/${this.question}`;
                this.refreshAction(url, "like");

            },
            refreshUnlike() {
                const url = `/question_unlike/refresh/${this.question}`;
                this.refreshAction(url, "unlike");
            },
        }


    }
</script>
