    <template id="dashboardEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'dashboard/edit/' + data.id" method="post">
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
                                        <button @click="update()" :disabled="errors.any()" class="btn btn-primary" type="button">
                                            <i class="load-indicator"><clip-loader :loading="saving" color="#fff" size="14px"></clip-loader> </i>
                                            {{submitbuttontext}}
                                            <i class="fa fa-send"></i>
                                        </button>
                                    </div>
                                </form>
                                <div v-show="loading" class="load-indicator static-center">
                                    <span class="animator">
                                        <clip-loader :loading="loading" color="gray" size="20px">
                                        </clip-loader>
                                    </span>
                                    <h4 style="color:gray" class="loading-text"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
    <script>
	var DashboardEditComponent = Vue.component('dashboardEdit', {
		template : '#dashboardEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'dashboard',
			},
			routename : {
				type : String,
				default : 'dashboardedit',
			},
			apipath : {
				type : String,
				default : 'dashboard/edit',
			},
		},
		data: function() {
			return {
				data : { t_name: '',user: '',role: '',status: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Dashboard';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/dashboard');
				}
			},
		},
		watch: {
			id: function(newVal, oldVal) {
				if(this.id){
					this.load();
				}
			},
			modelBind: function(){
				var binds = this.modelBind;
				for(key in binds){
					this.data[key]= binds[key];
				}
			},
			pageTitle: function(){
				this.SetPageTitle( this.pageTitle );
			},
		},
		created: function(){
			this.SetPageTitle(this.pageTitle);
		},
		mounted: function() {
			//this.load();
		},
	});
	</script>
