    <template id="companyAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Company</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="company/add" method="post">
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
	var CompanyAddComponent = Vue.component('companyAdd', {
		template : '#companyAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'company',
			},
			routename : {
				type : String,
				default : 'companyadd',
			},
			apipath : {
				type : String,
				default : 'company/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					COMPANY_ID: '',COMPANY_NAME: '',COMPANY_CITY: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Company';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/company');
			},
			resetForm : function(){
				this.data = {COMPANY_ID: '',COMPANY_NAME: '',COMPANY_CITY: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
