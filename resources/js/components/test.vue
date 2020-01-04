<template>
   <div>
     <div class="col-auto">
      <div class="input-group mb-2">
        <input :type="show ? 'text' : 'password'" id="inlineFormInputGroup" placeholder="Password">
        <div class="input-group-prepend">
          <button @click="show = !show">
            <i :class="show ? 'fa fa-eye' : 'fa fa-eye-slash'" aria-hidden="true"></i>
         </button>
        </div>
      </div>
     </div>
   </div>
</template>

<script>
   export default {
      data(){
         return{
            show : true
         }
      },
   }
</script>