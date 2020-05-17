    <template id="dashboardAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="dashboard/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('t_name')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="t_name">T Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.t_name"
                                                    v-validate="{required:true}"
                                                    data-vv-as="T Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="t_name"
                                                    placeholder="Enter T Name"
                                                    />
                                                    <small v-show="errors.has('t_name')" class="form-text text-danger">
                                                        {{ errors.first('t_name') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('user')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="user">User <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.user"
                                                    v-validate="{required:true}"
                                                    data-vv-as="User"
                                                    class="form-control "
                                                    type="text"
                                                    name="user"
                                                    placeholder="Enter User"
                                                    />
                                                    <small v-show="errors.has('user')" class="form-text text-danger">
                                                        {{ errors.first('user') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('role')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="role">Role <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.role"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Role"
                                                    class="form-control "
                                                    type="text"
                                                    name="role"
                                                    placeholder="Enter Role"
                                                    />
                                                    <small v-show="errors.has('role')" class="form-text text-danger">
                                                        {{ errors.first('role') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('status')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="status">Status <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.status"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Status"
                                                    class="form-control "
                                                    type="text"
                                                    name="status"
                                                    placeholder="Enter Status"
                                                    />
                                                    <small v-show="errors.has('status')" class="form-text text-danger">
                                                        {{ errors.first('status') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary"  :disabled="errors.any()" type="submit">
                                            <i class="load-indicator">
                                                <clip-loader :loading="saving" color="#fff" size="15px"></clip-loader>
                                            </i>
                                            {{submitbuttontext}}
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var DashboardAddComponent = Vue.component('dashboardAdd', {
		template : '#dashboardAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'dashboard',
			},
			routename : {
				type : String,
				default : 'dashboardadd',
			},
			apipath : {
				type : String,
				default : 'dashboard/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					t_name: '',user: '',role: '',status: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Dashboard';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/dashboard');
			},
			resetForm : function(){
				this.data = {t_name: '',user: '',role: '',status: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
