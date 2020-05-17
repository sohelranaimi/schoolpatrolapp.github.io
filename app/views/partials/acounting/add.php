    <template id="acountingAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Acounting</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="acounting/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('total_blance')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="total_blance">Total Blance <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.total_blance"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Total Blance"
                                                    class="form-control "
                                                    type="number"
                                                    name="total_blance"
                                                    placeholder="Enter Total Blance"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('total_blance')" class="form-text text-danger">
                                                        {{ errors.first('total_blance') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('total_cost')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="total_cost">Total Cost <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.total_cost"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Total Cost"
                                                    class="form-control "
                                                    type="number"
                                                    name="total_cost"
                                                    placeholder="Enter Total Cost"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('total_cost')" class="form-text text-danger">
                                                        {{ errors.first('total_cost') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('growth_blance')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="growth_blance">Growth Blance <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.growth_blance"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Growth Blance"
                                                    class="form-control "
                                                    type="number"
                                                    name="growth_blance"
                                                    placeholder="Enter Growth Blance"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('growth_blance')" class="form-text text-danger">
                                                        {{ errors.first('growth_blance') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('now_blance')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="now_blance">Now Blance <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.now_blance"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Now Blance"
                                                    class="form-control "
                                                    type="number"
                                                    name="now_blance"
                                                    placeholder="Enter Now Blance"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('now_blance')" class="form-text text-danger">
                                                        {{ errors.first('now_blance') }}
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
	var AcountingAddComponent = Vue.component('acountingAdd', {
		template : '#acountingAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'acounting',
			},
			routename : {
				type : String,
				default : 'acountingadd',
			},
			apipath : {
				type : String,
				default : 'acounting/add',
			},
			submitbuttontext: {
				type: String,
				default: 'Submit',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					total_blance: '',total_cost: '',growth_blance: '',now_blance: '',status: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Acounting';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/acounting');
			},
			resetForm : function(){
				this.data = {total_blance: '',total_cost: '',growth_blance: '',now_blance: '',status: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
