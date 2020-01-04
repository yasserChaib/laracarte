<template>
        <form class="border rounded p-3" @submit.prevent="submitComment" novalidate>
            <div class="form-group"> 
                <label for="validationName">Your Name:</label>
                <input type="text" class="form-control" :class="{'is-invalid' : errors.name}" v-model="form.name"  required="required">
                <div class="invalid-feedback">
                    {{errors.name ? errors.name[0] : ''}}
                </div>
            </div>
            <div class="form-group mb-3">    
                <div class="mb-3">
                    <label for="validationTextarea">Nouveau commentaire:</label>
                    <p v-if="respondTo">
                        En rèponse a <span class="font-weight-bold">{{respondTo.name}}</span> : "{{respondTo.message}}" .
                        <button type="button" class="btn btn-outline-danger" style="font-size: 12px;" @click="$emit('CancelRespondTo')">Annuler</button>
                    </p>    
                </div>

                <textarea class="form-control" :class="{'is-invalid' : errors.message}" v-model="form.message" id="validationTextarea" cols="15" rows="5" placeholder="Votre commantaire" required></textarea>
                <div class="invalid-feedback">
                    {{errors.message ? errors.message[0] : ''}}
                </div>
            </div>
            <button type="submit" value="Commenter" class="btn btn-primary btn-lg btn-block">Envoyer</button> 
        </form>
</template>

<script>
    export default {
        props:['respondTo'],
        data(){
            return {
                form:{
                    name:'',
                    message:'',
                    url: window.location.href,
                },
                errors:{},
            }
        },
        
        computed:{
            FullForm(){
                if(this.respondTo){
                    return {
                        ...this.form,
                        respondToId : this.respondTo.id,
                    }
                }
                return this.form
            }
        },

        methods: {
            submitComment(){
                axios.post('/comment',this.FullForm)
                    .then(({data}) => {
                    this.$emit('newComment',data)
                    this.form.message = ''
                    this.$emit('FinRespond')
                    this.errors= {}
                })
                    .catch(error =>{
                        console.dir(error.response.data.errors)
                        this.errors = error.response.data.errors
                    })

            }
        }
    }
</script>