<template>
    <div>
        <div class="border-b pb-4 mb-8">
            <ElementComment class="mb-4" 
                v-for="comment in comments" 
                :comment="comment" 
                :now="now" 
                v-bind:key="comment.id"
                @Respond-to="respondTo = $event"
            ></ElementComment>
            <div v-if="nextPage" class="row justify-content-md-center ">
                <button type="button" class="btn btn-outline-primary" style="font-size: 15px;" @click="FetchComment(nextPage)">
                    Charger les {{total - comments.length}} commentaires suivants.
                </button>
            </div>
        </div>
        <Commentform 
            @newComment="AddComment($event)" 
            :respondTo="respondTo"
            @CancelRespondTo="respondTo = null"
            @FinRespond="respondTo = null"
        ></Commentform>
    </div>
</template>

<script>
    import Commentform from './CommentForm.vue'
    import ElementComment from './ElementComment.vue'
    import { formatDistance } from 'date-fns'
    import { fr } from 'date-fns/locale'

    export default {
        components:{Commentform,ElementComment},

        mounted(){
            setInterval(() =>{
                this.now = new Date()
            }, 1000) 
            
            this.FetchComment('/comment/'+ btoa(window.location.href))

        },

        data(){
            return {
                comments: [],
                respondTo: null,
                now : new Date(),
                nextPage: null,
                total: 0 ,
            }
        },
        methods:{
            AddComment(event){
                if(! this.respondTo){
                    this.comments.push(event)
                    return
                }
                
                this.respondTo.children.push(event)
            },

            FetchComment(url){
                axios.get(url)
                .then(({data: page})=>{
                    if(window.location.href == 'http://localhost:8000/page2'){
                        console.log(page)
                        this.comments = this.comments.concat(page.data) 
                        this.nextPage = page.next_page_url  
                        this.total = page.total
                    }else{
                        this.comments = page
                    }
                })
            }

        },
         hello(){
             console.log('helloo')
         }

    }
</script>