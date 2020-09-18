<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                                <form >
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control" v-model="title"  placeholder="Enter Job title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Roles</label>
                                        <input type="text" class="form-control"  v-model="roles" placeholder="" name="roles">
                                    </div>
                                   <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" v-model="description"  placeholder="" name="description">
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" class="form-control" v-model="position" placeholder="" name="position">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Category</label>
                                       
                                        <select name="category" id="" class="form-control">

                                        </select>
                                    </div> -->
                                    <button type="submit" @click.prevent="saveJob" class="btn btn-primary">Submit</button>
                                </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Jobs You have Posted</div>

                    <div class="card-body">
                         <table class="table table-primary">
                            <thead>
                                <tr >
                                    <th scope="col"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(companyjob,index) in companyjob.data" :key="companyjob.id">
                                    <th scope="row">{{index+1}}</th>
                                    <td>{{companyjob.title}}</td>
                                    <td>{{companyjob.roles}}</td>
                                    <td>{{companyjob.description}}</td>
                                    <td>Edit|Delete</td>                                    
                                </tr>
                            </tbody>
                        </table>
                        <pagination :data="companyjob" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                companyjob: {},
                title: '',
                roles: '',
                description:'',
                position:''

            }
        },
        mounted() {
            
            this.getResults();
        },
        methods: {
            saveJob(){
                axios.post('save_job',{
                    title:this.title,
                    roles:this.roles,
                    description:this.description,
                    position:this.position
                })
                .then(response=> {
                    this.title = '';
                    this.roles = '';
                    this.description = '';
                    this.position = '';
                     this.getResults();
                });
            },
            getResults(page = 1) {
			axios.get('company/companyjob?page=' + page)
				.then(response => {
                    console.log(response.data);
					this.companyjob = response.data;
				});
		    }

        }
    }
</script>
