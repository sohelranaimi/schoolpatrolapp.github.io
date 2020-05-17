    <template id="acountingEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Acounting</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'acounting/edit/' + data.id" method="post">
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
	var AcountingEditComponent = Vue.component('acountingEdit', {
		template : '#acountingEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'acounting',
			},
			routename : {
				type : String,
				default : 'acountingedit',
			},
			apipath : {
				type : String,
				default : 'acounting/edit',
			},
		},
		data: function() {
			return {
				data : { total_blance: '',total_cost: '',growth_blance: '',now_blance: '',status: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Acounting';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/acounting');
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
