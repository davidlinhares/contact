<template>
    <div class="container">
        <form @submit.prevent="addContact()" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input v-model="contact.firstName" type="text" placeholder="First Name">
                </div>
                <div class="input-field col s6">
                    <input v-model="contact.lastName" type="text" placeholder="Last Name">
                </div>
                <div class="input-field col s6">
                    <input v-model="contact.phoneNumber" type="text" placeholder="Phone Number">
                </div>
                <div class="input-field col s6">
                    <input v-model="contact.company" type="text" placeholder="Company">
                </div>
                <div class="input-field col s6">
                    <input v-model="contact.email" type="text" placeholder="E-mail">
                </div>
                <div class="input-field col s6">
                    <input v-model="contact.address" type="text" placeholder="Address">
                </div>
                <div class="input-field col s6">
                    <input v-model="contact.website" type="text" placeholder="Website">
                </div>
                <div class="input-field col s6">
                    <textarea v-model="contact.comments" class="materialize-textarea" placeholder="Comments"></textarea>
                </div>
                <div class="input-field col s12">
                    <button type="submit" class="btn green right">Submit</button>
                </div>
            </div>
        </form>
        <ul class="pagination">
            <li v-bind:class="[{disabled: !pagination.prev_page_url}]">
                <a v-bind:class="[{disabled: !pagination.prev_page_url}]" href="#!" @click="fetchContacts(pagination.prev_page_url)"><i class="material-icons">chevron_left</i></a>
            </li>
            <li class="disabled"><a href="#!">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
            <li v-bind:class="[{disabled: !pagination.next_page_url}]">
                <a v-bind:class="[{disabled: !pagination.next_page_url}]" href="#!" @click="fetchContacts(pagination.next_page_url)"><i class="material-icons">chevron_right</i></a>
            </li>
        </ul>
        <div v-for="contact in contacts" v-bind:key="contact.id" class="card blue">
            <div class="card-content white-text">
                <span class="card-title">{{ contact.firstName + " " + contact.lastName }}</span>
                <p>Phone Number: {{ contact.phoneNumber }}</p>
                <p>Company: {{ contact.company }}</p>
            </div>
            <div class="card-action">
                <a href="#" @click="editContact(contact)">Edit</a>
                <a href="#" @click="deleteContact(contact.id)">Delete</a>
            </div>
        </div>
    </div>
</template>
    
<script>
    export default {
        data() {
            return {
                contacts: [],
                contact: {
                    id: '',
                    firstName: '',
                    lastName: '',
                    phoneNumber: '',
                    company: '',
                    email: '',
                    address: '',
                    website: '',
                    comments: '',
                    created_at: '',
                    updated_at: ''
                },
                contact_id: '',
                pagination: {},
                edit: false
            }
        },
        created(){
            this.fetchContacts();
        },
        methods: {
            fetchContacts(page_url){
                let vm = this;
                page_url = page_url || 'api/contacts'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.contacts = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err => console.log(err));
            },
            makePagination(meta, links){
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };
                this.pagination = pagination;
            },
            deleteContact(id){
                if(confirm('Are you sure?')){
                    fetch(`api/contact/${id}`, {
                        method: 'delete'
                    })
                        .then(res => res.json())
                        .then(res => {
                            alert('Contact removed!');
                            this.fetchContacts();
                        })
                        .catch(err => console.log(err));
                }
            },
            addContact(){
                if(this.edit === false){
                    fetch('api/contact', {
                        method: 'post',
                        body: JSON.stringify(this.contact),
                        headers: {
                            'content-type':'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(res => {
                            this.contact.firstName = '';
                            this.contact.lastName = '';
                            this.contact.phoneNumber = '';
                            this.contact.company = '';
                            this.contact.email = '';
                            this.contact.address = '';
                            this.contact.website = '';
                            this.contact.comments = '';
                            alert('Contact added!');
                            this.fetchContacts(`api/contacts?page=${this.pagination.current_page}`);
                        })
                        .catch(err => console.log(err));
                } else {
                    fetch('api/contact', {
                        method: 'put',
                        body: JSON.stringify(this.contact),
                        headers: {
                            'content-type':'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(res => {
                            this.contact.firstName = '';
                            this.contact.lastName = '';
                            this.contact.phoneNumber = '';
                            this.contact.company = '';
                            this.contact.email = '';
                            this.contact.address = '';
                            this.contact.website = '';
                            this.contact.comments = '';
                            alert('Contact updated!');
                            this.fetchContacts(`api/contacts?page=${this.pagination.current_page}`);
                        })
                        .catch(err => console.log(err));
                }
            },
            editContact(contact){
                this.edit = true;
                this.contact.id = contact.id;
                this.contact.contact_id = contact.id;
                this.contact.firstName = contact.firstName;
                this.contact.lastName = contact.lastName;
                this.contact.phoneNumber = contact.phoneNumber;
                this.contact.company = contact.company;
                this.contact.email = contact.email;
                this.contact.address = contact.address;
                this.contact.website = contact.website;
                this.contact.comments = contact.comments;
            }
        }
    }
</script>