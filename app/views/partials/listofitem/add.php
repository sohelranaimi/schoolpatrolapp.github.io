    <template id="listofitemAdd">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Add New Listofitem</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form enctype="multipart/form-data" @submit="save" class="form form-default" action="listofitem/add" method="post">
                                    <div class="form-group " :class="{'has-error' : errors.has('ITEMCODE')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ITEMCODE">Itemcode <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ITEMCODE"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Itemcode"
                                                    class="form-control "
                                                    type="text"
                                                    name="ITEMCODE"
                                                    placeholder="Enter Itemcode"
                                                    />
                                                    <small v-show="errors.has('ITEMCODE')" class="form-text text-danger">
                                                        {{ errors.first('ITEMCODE') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('ITEMNAME')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="ITEMNAME">Itemname <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.ITEMNAME"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Itemname"
                                                    class="form-control "
                                                    type="text"
                                                    name="ITEMNAME"
                                                    placeholder="Enter Itemname"
                                                    />
                                                    <small v-show="errors.has('ITEMNAME')" class="form-text text-danger">
                                                        {{ errors.first('ITEMNAME') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('BATCHCODE')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="BATCHCODE">Batchcode <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.BATCHCODE"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Batchcode"
                                                    class="form-control "
                                                    type="text"
                                                    name="BATCHCODE"
                                                    placeholder="Enter Batchcode"
                                                    />
                                                    <small v-show="errors.has('BATCHCODE')" class="form-text text-danger">
                                                        {{ errors.first('BATCHCODE') }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " :class="{'has-error' : errors.has('CONAME')}">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="CONAME">Coname <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input v-model="data.CONAME"
                                                    v-validate="{required:true}"
                                                    data-vv-as="Coname"
                                                    class="form-control "
                                                    type="text"
                                                    name="CONAME"
                                                    placeholder="Enter Coname"
                                                    />
                                                    <small v-show="errors.has('CONAME')" class="form-text text-danger">
                                                        {{ errors.first('CONAME') }}
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
	var ListofitemAddComponent = Vue.component('listofitemAdd', {
		template : '#listofitemAdd',
		mixins: [AddPageMixin],
		props:{
			pagename : {
				type : String,
				default : 'listofitem',
			},
			routename : {
				type : String,
				default : 'listofitemadd',
			},
			apipath : {
				type : String,
				default : 'listofitem/add',
			},
		},
		data : function() {
			return {
				id : {
					type : String,
					default : '',
				},
				data : {
					ITEMCODE: '',ITEMNAME: '',BATCHCODE: '',CONAME: '',
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'Add New Listofitem';
			},
		},
		methods: {
			actionAfterSave : function(response){
				this.$root.$emit('requestCompleted' , this.msgaftersave);
				this.$router.push('/listofitem');
			},
			resetForm : function(){
				this.data = {ITEMCODE: '',ITEMNAME: '',BATCHCODE: '',CONAME: '',};
				this.$validator.reset();
			},
		},
		mounted : function() {
		},
	});
	</script>
