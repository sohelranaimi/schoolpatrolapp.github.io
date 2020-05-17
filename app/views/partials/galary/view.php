    <template id="galaryView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Galary</h3>
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
                                                    <th class="title"> Id :</th>
                                                    <td class="value"> {{ data.id }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Date :</th>
                                                    <td class="value"> {{ data.date }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Photo :</th>
                                                    <td class="value"><niceimg :path="data.photo" width="400" height="400" ></niceimg> </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Video :</th>
                                                    <td class="value"> {{ data.vidio }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Text :</th>
                                                    <td class="value"><router-link :to="'/galary/view/' +  data.id">{{data.text}}</router-link></td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/galary/edit/'  + data.id">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/galary/delete/' + data.id">
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
	var GalaryViewComponent = Vue.component('galaryView', {
		template : '#galaryView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'galary',
			},
			routename : {
				type : String,
				default : 'galaryview',
			},
			apipath: {
				type : String,
				default : 'galary/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						id: '',date: '',photo: '',vidio: '',text: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Galary';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					id: '',date: '',photo: '',vidio: '',text: '',
				}
			},
		},
	});
	</script>
