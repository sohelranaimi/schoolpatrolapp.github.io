    <template id="listofitemEdit">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">Edit  Listofitem</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-7 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <form  v-show="!loading" enctype="multipart/form-data" @submit="update()" class="form form-default" :action="'listofitem/edit/' + data.id" method="post">
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
	var ListofitemEditComponent = Vue.component('listofitemEdit', {
		template : '#listofitemEdit',
		mixins: [EditPageMixin],
		props: {
			pagename : {
				type : String,
				default : 'listofitem',
			},
			routename : {
				type : String,
				default : 'listofitemedit',
			},
			apipath : {
				type : String,
				default : 'listofitem/edit',
			},
		},
		data: function() {
			return {
				data : { ITEMCODE: '',ITEMNAME: '',BATCHCODE: '',CONAME: '', },
			}
		},
		computed: {
			pageTitle: function(){
				return 'Edit  Listofitem';
			},
		},
		methods: {
			actionAfterUpdate : function(response){
				this.$root.$emit('requestCompleted' , this.msgafterupdate);
				if(!this.ismodal){
					this.$router.push('/listofitem');
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
