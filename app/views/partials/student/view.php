    <template id="studentView">
        <section class="page-component">
            <div v-if="showheader" class="bg-light p-3 mb-3">
                <div class="container">
                    <div class="row ">
                        <div  class="col-12 comp-grid" :class="setGridSize">
                            <h3 class="record-title">View  Student</h3>
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
                                                    <th class="title"> Name :</th>
                                                    <td class="value"> {{ data.NAME }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Title :</th>
                                                    <td class="value"> {{ data.TITLE }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Class :</th>
                                                    <td class="value"> {{ data.CLASS }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Section :</th>
                                                    <td class="value"> {{ data.SECTION }} </td>
                                                </tr>
                                                <tr>
                                                    <th class="title"> Rollid :</th>
                                                    <td class="value"> {{ data.ROLLID }} </td>
                                                </tr>
                                            </tbody>
                                            <!-- Table Body End -->
                                        </table>
                                    </div>
                                    <div v-if="editbutton || deletebutton || exportbutton" class="py-3">
                                        <span >
                                            <router-link class="btn btn-sm btn-info has-tooltip" v-if="editbutton"  :to="'/student/edit/'  + data.CLASS">
                                            <i class="fa fa-edit"></i> 
                                            </router-link>
                                            <button @click="deleteRecord" class="btn btn-sm btn-danger" v-if="deletebutton" :to="'/student/delete/' + data.CLASS">
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
	var StudentViewComponent = Vue.component('studentView', {
		template : '#studentView',
		mixins: [ViewPageMixin],
		props: {
			pagename: {
				type : String,
				default : 'student',
			},
			routename : {
				type : String,
				default : 'studentview',
			},
			apipath: {
				type : String,
				default : 'student/view',
			},
		},
		data: function() {
			return {
				data : {
					default :{
						NAME: '',TITLE: '',CLASS: '',SECTION: '',ROLLID: '',
					},
				},
			}
		},
		computed: {
			pageTitle: function(){
				return 'View  Student';
			},
		},
		methods :{
			resetData : function(){
				this.data = {
					NAME: '',TITLE: '',CLASS: '',SECTION: '',ROLLID: '',
				}
			},
		},
	});
	</script>
