    <template id="fees_collectionView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Fees Collection</h3>
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
                                                    <th class="title"> Agent Code :</th>
                                                    <td class="value"> {{ data.AGENT_CODE }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Agent Name :</th>
                                                    <td class="value"> {{ data.AGENT_NAME }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Working Area :</th>
                                                    <td class="value"> {{ data.WORKING_AREA }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Commission :</th>
                                                    <td class="value"> {{ data.COMMISSION }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Phone No :</th>
                                                    <td class="value"> {{ data.PHONE_NO }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Country :</th>
                                                    <td class="value"><router-link :to="'/fees_collection/view/' +  data.AGENT_CODE">{{data.COUNTRY}}</router-link></td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/fees_collection/edit/'  + data.AGENT_CODE">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/fees_collection/delete/' + data.AGENT_CODE">
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
	var Fees_CollectionViewComponent = Vue.component('fees_collectionView', {
		template : '#fees_collectionView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'fees_collection',
			},
			routename : {
				type : String,
				default : 'fees_collectionview',
			},
			apipath: {
				type : String,
				default : 'fees_collection/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						AGENT_CODE: '',AGENT_NAME: '',WORKING_AREA: '',COMMISSION: '',PHONE_NO: '',COUNTRY: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Fees Collection';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					AGENT_CODE: '',AGENT_NAME: '',WORKING_AREA: '',COMMISSION: '',PHONE_NO: '',COUNTRY: '',
				}
			},
		},
	});
	</script>
