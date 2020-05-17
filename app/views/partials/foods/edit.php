    <template id="foodsEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Foods</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'foods/edit/' + data.id" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('ITEM_ID')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ITEM_ID">Item Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ITEM_ID"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Item Id"
                                                    class="form-control "
                                                    type="text"
                                                    name="ITEM_ID"
                                                    placeholder="Enter Item Id"
                                                    />
                                                    <small v-show="errors.has('ITEM_ID')" class="form-text text-danger">
                                                        {{ errors.first('ITEM_ID') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('ITEM_NAME')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ITEM_NAME">Item Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ITEM_NAME"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Item Name"
                                                    class="form-control "
                                                    type="text"
                                                    name="ITEM_NAME"
                                                    placeholder="Enter Item Name"
                                                    />
                                                    <small v-show="errors.has('ITEM_NAME')" class="form-text text-danger">
                                                        {{ errors.first('ITEM_NAME') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('ITEM_UNIT')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ITEM_UNIT">Item Unit <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ITEM_UNIT"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Item Unit"
                                                    class="form-control "
                                                    type="text"
                                                    name="ITEM_UNIT"
                                                    placeholder="Enter Item Unit"
                                                    />
                                                    <small v-show="errors.has('ITEM_UNIT')" class="form-text text-danger">
                                                        {{ errors.first('ITEM_UNIT') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
	var FoodsEditComponent = Vue.component('foodsEdit', {
		template : '#foodsEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'foods',
			},
			routename : {
				type : String,
				default : 'foodsedit',
			},
			apipath : {
				type : String,
				default : 'foods/edit',
			},
		},
		data: function() {
			return {
				data : { ITEM_ID: '',ITEM_NAME: '',ITEM_UNIT: '',COMPANY_ID: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Foods';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/foods');
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
