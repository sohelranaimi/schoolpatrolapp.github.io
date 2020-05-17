    <template id="companyView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Company</h3>
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
                                                    <th class="title"> Company Id :</th>
                                                    <td class="value"><router-link :to="'/company/view/' +  data.COMPANY_ID">{{data.COMPANY_ID}}</router-link></td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Company Name :</th>
                                                    <td class="value"> {{ data.COMPANY_NAME }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Company City :</th>
                                                    <td class="value"> {{ data.COMPANY_CITY }} </td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/company/edit/'  + data.COMPANY_ID">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/company/delete/' + data.COMPANY_ID">
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
	var CompanyViewComponent = Vue.component('companyView', {
		template : '#companyView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'company',
			},
			routename : {
				type : String,
				default : 'companyview',
			},
			apipath: {
				type : String,
				default : 'company/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						COMPANY_ID: '',COMPANY_NAME: '',COMPANY_CITY: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Company';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					COMPANY_ID: '',COMPANY_NAME: '',COMPANY_CITY: '',
				}
			},
		},
	});
	</script>
