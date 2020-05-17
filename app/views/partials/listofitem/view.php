    <template id="listofitemView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Listofitem</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="pb-2 mb-3 border-bottom">
                <div class="container">
                    <div class="row ">
                        <div  class="col-md-12 comp-grid" :class="setGridSize">
                            <div  class=" animated fadeIn">
                                <div v-show="!loading">
                                    <div ref="datatable" id="datatable">
                                        <table class="table table-hover table-borderless table-striped">
                                            <!-- Table Body Start -->
                                            <tbody>
                                                <tr>
                                                    <th class="title"> Itemcode :</th>
                                                    <td class="value"> {{ data.ITEMCODE }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Itemname :</th>
                                                    <td class="value"> {{ data.ITEMNAME }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Batchcode :</th>
                                                    <td class="value"> {{ data.BATCHCODE }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Coname :</th>
                                                    <td class="value"> {{ data.CONAME }} </td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/listofitem/edit/'  + data.ITEMCODE">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/listofitem/delete/' + data.ITEMCODE">
                                            <i class="fa fa-times"></i> </button>
                                        </span>
                                        <button @click="exportRecord" class="btn btn-sm btn-primary" v-if="exportbutton">
                                            <i class="fa fa-save"></i> 
                                        </button>
                                    </div>
                                </div>
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
	var ListofitemViewComponent = Vue.component('listofitemView', {
		template : '#listofitemView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'listofitem',
			},
			routename : {
				type : String,
				default : 'listofitemview',
			},
			apipath: {
				type : String,
				default : 'listofitem/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						ITEMCODE: '',ITEMNAME: '',BATCHCODE: '',CONAME: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Listofitem';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					ITEMCODE: '',ITEMNAME: '',BATCHCODE: '',CONAME: '',
				}
			},
		},
	});
	</script>
