    <template id="companyEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Company</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'company/edit/' + data.id" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('COMPANY_ID')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="COMPANY_ID">Company Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.COMPANY_ID"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Company Id"
                                                    class="form-control "
                                                    type="text"
                                                    name="COMPANY_ID"
                                                    placeholder="Enter Company Id"
                                                    />
                                                    <small v-show="errors.has('COMPANY_ID')" class="form-text text-danger">
                                                        {{ errors.first('COMPANY_ID') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('COMPANY_NAME')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="COMPANY_NAME">Company Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.COMPANY_NAME"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Company Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="COMPANY_NAME"
                                                    placeholder="Enter Company Name"
                                                    />
                                                    <small v-show="errors.has('COMPANY_NAME')" class="form-text text-danger">
                                                        {{ errors.first('COMPANY_NAME') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('COMPANY_CITY')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="COMPANY_CITY">Company City <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.COMPANY_CITY"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Company City"
                                                    class="form-control "
                                                    type="text"
                                                    name="COMPANY_CITY"
                                                    placeholder="Enter Company City"
                                                    />
                                                    <small v-show="errors.has('COMPANY_CITY')" class="form-text text-danger">
                                                        {{ errors.first('COMPANY_CITY') }}
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
	var CompanyEditComponent = Vue.component('companyEdit', {
		template : '#companyEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'company',
			},
			routename : {
				type : String,
				default : 'companyedit',
			},
			apipath : {
				type : String,
				default : 'company/edit',
			},
		},
		data: function() {
			return {
				data : { COMPANY_ID: '',COMPANY_NAME: '',COMPANY_CITY: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Company';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/company');
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
