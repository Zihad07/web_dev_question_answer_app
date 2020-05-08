<template>
    <span>
        <span class="separator">|</span>
        <span style="cursor: pointer" @click="likeAction">myLike({{ like }})</span>
        <span class="separator">|</span>
        <span style="cursor: pointer" @click="unlikeAction">myUnlike({{ unlike }})</span>

    </span>
</template>

<script>
    export default {
        props : ['question', 'comment'],
        mounted() {
          this.refresh()
        },
        data() {
            return {
                like: 0,
                unlike: 0,
            }
        },
        methods: {
            action(url) {
                axios.get(url)
                    .then((response)=> {
                        this.refresh();
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            },
            refreshAction(url) {
              axios.get(url).
                    then((respons) => {
                        // console.log(respons.data);
                        this.like = respons.data.like;
                        this.unlike = respons.data.unlike;

              }).catch((error) => {
                  console.log(error);
              })
            },
            likeAction() {
                const url = `/comment_like/${this.question}/${this.comment}`;
                this.action(url);
            },
            unlikeAction() {
                const url = `/comment_unlike/${this.question}/${this.comment}`;
                this.action(url);
            },
            refresh() {
                // console.log('refresh like link');
                const url = `/comment_like_unlike/refresh/${this.comment}`;
                this.refreshAction(url);
            },

        }
    }
</script>

<style scoped>

</style>
