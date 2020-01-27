<template>

    <div>
        <nav class="panel column is-offset-2 is-8">
            <p class="panel-heading">
                Phonebook
                <button class="button is-primary is-outlined " @click="openAdd">
                    Add new
                </button>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Search">
                    <span class="icon is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
                </p>
            </div>
            <p class="panel-tabs">
                <a class="is-active">All</a>
                <a>Public</a>
                <a>Private</a>
                <a>Sources</a>
                <a>Forks</a>
            </p>

            <a class="panel-block is-active" v-for="item,key in lists">

            <span class="column is-9">
             {{item.name}}
            </span>
                <span class="panel-icon column is-1">
             <i  class="fa fa-trash-o has-text-danger" aria-hidden="true" @click="openDelete(item.id)"></i>
            </span>
                <span class="panel-icon column is-1">
                  <i class="fa fa-edit" aria-hidden="true" @click="openEdit(key)"></i>
             </span>
                <span class="panel-icon column is-1">
                 <i class="fa fa-eye has-text-block" aria-hidden="true" @click="openShow(key)"></i>
             </span>


            </a>


            <!--<label class="panel-block">-->
            <!--<input type="checkbox">-->
            <!--remember me-->
            <!--</label>-->
            <!--<div class="panel-block">-->
            <!--<button class="button is-link is-outlined is-fullwidth">-->
            <!--Reset all filters-->
            <!--</button>-->
            <!--</div>-->
        </nav>

        <add-component :openmodal="addActive" @requestClose="closeAdd"></add-component>
        <show-component :openmodal="showActive" @requestClose="closeShow"></show-component>
        <edit-component :openmodal="showEdit" @requestClose="closeEdit"></edit-component>
        <delete-component :openmodal="showDelete" @requestClose="closeDelete"></delete-component>
    </div>

</template>

<script>



     Vue.component('add-component', require('./addComponent'));
     Vue.component('show-component', require('./showComponent'));
     Vue.component('edit-component', require('./editComponent'));
     Vue.component('delete-component', require('./deleteComponent'));
    export default {
        components:{},
        data(){
            return{
            addActive:'',
                showActive:'',
                showEdit:'',
                showDelete:'',
                lists:{},
                errors:{}
            }
        },
        mounted(){
          this.getdata();
        },
        methods:{
            getdata(){
                axios.post('getData').then((response)=> {
                    this.lists = response.data;
                })
                    .catch((error) => this.errors = error.response.data.errors)
            },
            openAdd(){
                  this.addActive = 'is-active';
            },
            closeAdd(){
                this.addActive = '';
                this.showActive = '';
                this.showEdit = '';
            },
            openShow(key){
                this.$children[1].list = this.lists[key];
                this.showActive = 'is-active';
            },
            closeShow(){
                this.addActive = '';
                this.showActive = '';
                this.showEdit = '';
            },
            openEdit(key){
                this.$children[2].list = this.lists[key];
                this.showEdit ='is-active';
            },
            closeEdit(){
                this.addActive = '';
                this.showActive = '';
                this.showEdit = '';
            },
            openDelete(id){
                this.showDelete = 'is-active'
                this.$children[3].id = id;
            },
            closeDelete(){
                this.addActive = '';
                this.showActive = '';
                this.showEdit = '';
                this.showDelete = '';
            }
        }
    }
</script>
