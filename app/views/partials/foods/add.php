    <template id="foodsAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Foods</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="foods/add" method="post">
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
	var FoodsAddComponent = Vue.component('foodsAdd', {
		template : '#foodsAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'foods',
			},
			routename : {
				type : String,
				default : 'foodsadd',
			},
			apipath : {
				type : String,
				default : 'foods/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					ITEM_ID: '',ITEM_NAME: '',ITEM_UNIT: '',COMPANY_ID: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Foods';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/foods');
			},
			resetForm : function(){
				this.data = {ITEM_ID: '',ITEM_NAME: '',ITEM_UNIT: '',COMPANY_ID: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
