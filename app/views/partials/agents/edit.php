    <template id="agentsEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Agents</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'agents/edit/' + data.id" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('AGENT_CODE')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="AGENT_CODE">Agent Code <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.AGENT_CODE"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Agent Code"
                                                    class="form-control "
                                                    type="text"
                                                    name="AGENT_CODE"
                                                    placeholder="Enter Agent Code"
                                                    />
                                                    <small v-show="errors.has('AGENT_CODE')" class="form-text text-danger">
                                                        {{ errors.first('AGENT_CODE') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('AGENT_NAME')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="AGENT_NAME">Agent Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.AGENT_NAME"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Agent Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="AGENT_NAME"
                                                    placeholder="Enter Agent Name"
                                                    />
                                                    <small v-show="errors.has('AGENT_NAME')" class="form-text text-danger">
                                                        {{ errors.first('AGENT_NAME') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('WORKING_AREA')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="WORKING_AREA">Working Area <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.WORKING_AREA"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Working Area"
                                                    class="form-control "
                                                    type="text"
                                                    name="WORKING_AREA"
                                                    placeholder="Enter Working Area"
                                                    />
                                                    <small v-show="errors.has('WORKING_AREA')" class="form-text text-danger">
                                                        {{ errors.first('WORKING_AREA') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('COMMISSION')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="COMMISSION">Commission <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.COMMISSION"
                                                    v-validate="{required:true,  numeric:true}"
                                                    data-vv-as="Commission"
                                                    class="form-control "
                                                    type="number"
                                                    name="COMMISSION"
                                                    placeholder="Enter Commission"
                                                    step="1" 
                                                    />
                                                    <small v-show="errors.has('COMMISSION')" class="form-text text-danger">
                                                        {{ errors.first('COMMISSION') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('PHONE_NO')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="PHONE_NO">Phone No <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.PHONE_NO"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Phone No"
                                                    class="form-control "
                                                    type="text"
                                                    name="PHONE_NO"
                                                    placeholder="Enter Phone No"
                                                    />
                                                    <small v-show="errors.has('PHONE_NO')" class="form-text text-danger">
                                                        {{ errors.first('PHONE_NO') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('COUNTRY')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="COUNTRY">Country <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.COUNTRY"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Country"
                                                    class="form-control "
                                                    type="text"
                                                    name="COUNTRY"
                                                    placeholder="Enter Country"
                                                    />
                                                    <small v-show="errors.has('COUNTRY')" class="form-text text-danger">
                                                        {{ errors.first('COUNTRY') }}
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
	var AgentsEditComponent = Vue.component('agentsEdit', {
		template : '#agentsEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'agents',
			},
			routename : {
				type : String,
				default : 'agentsedit',
			},
			apipath : {
				type : String,
				default : 'agents/edit',
			},
		},
		data: function() {
			return {
				data : { AGENT_CODE: '',AGENT_NAME: '',WORKING_AREA: '',COMMISSION: '',PHONE_NO: '',COUNTRY: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Agents';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/agents');
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
