<template>

    <div class="modal" :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label>name</label>
                    <div class="control">
                        <input class="input is-info" type="text" placeholder="name" v-model="list.name">
                    </div>
                    <small v-if="errors.name" class="has-text-danger">{{errors.name[0]}}</small>
                </div>

                <div class="field">
                    <label>phone</label>
                    <div class="control">
                        <input class="input is-info" type="number" placeholder="phone" v-model="list.phone">
                    </div>
                    <small v-if="errors.phone" class="has-text-danger">{{errors.phone[0]}}</small>
                </div>

                <div class="field">
                    <label>email</label>
                    <div class="control">
                        <input class="input is-info" type="email" placeholder="email" v-model="list.email">
                    </div>
                    <small v-if="errors.email" class="has-text-danger">{{errors.email[0]}}</small>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="save()">update</button>
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
                list: {},
                errors:{}
            }
        },
        methods:{
            close(){
                this.$emit('requestClose');
            },
            save(){
                axios.put(`/phonebook/${this.list.id}`,this.$data.list).then((response)=> {
                    this.close()

                })
                    .catch((error) => this.errors = error.response.data.errors)
            }
        }


    }
</script>
