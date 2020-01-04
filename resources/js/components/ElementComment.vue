<template>
<div>
    <div class="border rounded px-3 pt-3 pb-2"> 
        <div class="mb-2">
            <p class="text-sm text-muted mb-2">
                {{comment.name}} - il y a {{DiffForHumans}}
            </p>
            <p v-if="!edit">
                {{comment.message}}
            </p>
            <p v-else>
                <textarea class="form-control" v-model="message"></textarea>
            </p>
        </div>
        <p v-if="!edit">
            <button type="button" class="btn btn-outline-secondary" style="font-size: 12px;" @click="$emit('Respond-to' , comment)">
                <i class="fa fa-reply"></i> Répondre
            </button>
            <button type="button" class="btn btn-outline-secondary" style="font-size: 12px;" @click="ModiferComment()">
                <i class="fa fa-edit"></i> Modifier
            </button>
        </p> 
        <p v-else>
            <button type="button" class="btn btn-outline-secondary" style="font-size: 12px;" @click="edit = false">
                <i class="fa fa-times-circle"></i> Anuuler
            </button>
            <button type="button" class="btn btn-outline-secondary" style="font-size: 12px;" @click="Update()">
                <i class="fa fa-save"></i> Enregistrer
            </button>
        </p>        
    </div>
    <div class="mt-4 border-left pl-4" style="border-left: 6px solid #034d97!important">
        <ElementComment class="mb-4" 
                v-for="child in comment.children" 
                :comment="child" 
                :now="now" 
                v-bind:key="child.id"
                @Respond-to="$emit('Respond-to' , $event)"
        ></ElementComment>
    </div>
</div>
</template>

<script>
    import { formatDistance } from 'date-fns'
    import { fr } from 'date-fns/locale'

    export default {
        // @Respond-to="$emit('Respond-to' , $event)" chaque enfant il doit appeler sont parent jusqu'a 
        // l'arriver a comment.
       
       // dans une appelle recursive on doit utiliser l'option name qui contient le nom de la vue. 
        name:"ElementComment",

        props : ['comment','now'],

        data(){
            return{
                edit: false,
                message:''
            }
        },

        computed:{
            DiffForHumans(){
                return formatDistance(new Date(this.comment.created_at) , this.now , {locale: fr})
            }
        },
        methods:{
            ModiferComment(){
                this.message = this.comment.message
                this.edit = true
            },
            Update(){
                this.comment.message = this.message
                this.edit = false
            }
        },
    }
</script>