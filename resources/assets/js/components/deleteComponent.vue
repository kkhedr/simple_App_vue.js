<template>

    <div class="modal" :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>

            <footer class="modal-card-foot">
                <button class="button is-success" @click="deletePhonebook">delete</button>
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>

</template>

<script>
    export default {
        components:{},
        props:['openmodal'],
        data(){
            return {
                id:''
            }
        },
        methods:{
            close(){
                this.$emit('requestClose');
            },
            deletePhonebook(){
                axios.delete(`/phonebook/${this.id}`).then((response)=> {
                    this.refresh();
                    this.close();
                })
                    .catch((error) => this.errors = error.response.data.errors)
            },
            refresh(){
                axios.post('getData').then((response)=> {
                    this.$parent.lists = response.data;
                })
                    .catch((error) => this.errors = error.response.data.errors)
            }
        }


    }
</script>
