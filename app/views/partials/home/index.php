        <template id="Home">
            <div>
                <div  class="bg-light p-3 mb-3">
                    <div class="container">
                        <div class="row ">
                            <div  class="col-md-12 comp-grid" :class="setGridSize">
                                <h3 >The Dashboard</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="pb-2 mb-3 border-bottom">
                    <div class="container-fluid">
                        <div class="row ">
                            <div  class="col-md-6 comp-grid" :class="setGridSize">
                            <recordprogress layout="flex" :diameter="60" animate="zoomIn" datapath="components/getcount_student" title="Student" desc="" link="/student" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="alert" variant="success"></recordprogress>
                        </div>
                        <div  class="col-md-6 comp-grid" :class="setGridSize">
                        <recordprogress layout="flex" :diameter="60" animate="zoomIn" datapath="components/getcount_teacher" title="Teacher" desc="" link="/teacher" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="alert" variant="success"></recordprogress>
                    </div>
                </div>
            </div>
        </div>
        <div  class="pb-2 mb-3 border-bottom">
            <div class="container-fluid">
                <div class="row ">
                    <div  class="col-md-6 comp-grid" :class="setGridSize">
                    <recordcount animate="zoomIn" datapath="components/getcount_classattendance" title="Class Attendance" desc="" link="/class_attendance" icon='<i class="fa fa-globe"></i>' :progressmax="1000" displaystyle="card" variant="success bg-info"></recordcount>
                </div>
                <div  class="col-md-6 comp-grid" :class="setGridSize">
                <recordcount animate="zoomIn" datapath="components/getcount_newstudent" title="New Student" desc="" link="/new_student" icon='<i class="fa fa-globe"></i>' :progressmax="1000" displaystyle="card" variant="success bg-info"></recordcount>
            </div>
        </div>
        </div>
        </div>
        <div  class="pb-2 mb-3 border-bottom">
            <div class="container-fluid">
                <div class="row ">
                    <div  class="col-md-6 comp-grid" :class="setGridSize">
                    <recordprogress layout="box" :diameter="90" animate="zoomIn" datapath="components/getcount_class" title="Class" desc="" link="/class" icon='<i class="fa fa-globe"></i>' :progressmax="10" displaystyle="alert" variant="info"></recordprogress>
                </div>
                <div  class="col-md-6 comp-grid" :class="setGridSize">
                <recordprogress layout="box" :diameter="90" animate="zoomIn" datapath="components/getcount_result" title="Result" desc="" link="/result" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="alert" variant="info"></recordprogress>
            </div>
        </div>
        </div>
        </div>
        <div  class="pb-2 mb-3 border-bottom">
            <div class="container-fluid">
                <div class="row ">
                    <div  class="col-md-6 comp-grid" :class="setGridSize">
                    <recordcount animate="zoomInUp" datapath="components/getcount_payment" title="Payment" desc="" link="/payment" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="none" variant="danger bg-success"></recordcount>
                </div>
                <div  class="col-md-6 comp-grid" :class="setGridSize">
                <recordcount animate="zoomInUp" datapath="components/getcount_acounting" title="Acounting" desc="" link="/acounting" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="card" variant="danger bg-success"></recordcount>
            </div>
        </div>
        </div>
        </div>
        <div  class="pb-2 mb-3 border-bottom">
            <div class="container-fluid">
                <div class="row ">
                    <div  class="col-md-6 comp-grid" :class="setGridSize">
                    <recordprogress layout="box" :diameter="90" animate="zoomIn" datapath="components/getcount_hostel" title="Hostel" desc="" link="/hostel" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="card" variant="info bg-primary"></recordprogress>
                </div>
                <div  class="col-md-6 comp-grid" :class="setGridSize">
                <recordprogress layout="box" :diameter="90" animate="zoomIn" datapath="components/getcount_examination" title="Examination" desc="" link="/examination" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="card" variant="info bg-primary"></recordprogress>
            </div>
        </div>
        </div>
        </div>
        <div  class="pb-2 mb-3 border-bottom">
            <div class="container-fluid">
                <div class="row ">
                    <div  class="col-md-6 comp-grid" :class="setGridSize">
                    <recordcount animate="zoomIn" datapath="components/getcount_galary" title="Galary" desc="" link="/galary" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="card" variant="info bg-danger"></recordcount>
                </div>
                <div  class="col-md-6 comp-grid" :class="setGridSize">
                <recordcount animate="zoomIn" datapath="components/getcount_user" title="User" desc="" link="/user" icon='<i class="fa fa-globe"></i>' :progressmax="100" displaystyle="card" variant="info bg-danger"></recordcount>
            </div>
        </div>
        </div>
        </div>
        </div>
        </template>
        <script>
			var HomeComponent = Vue.component('HomeComponent', {
				template : '#Home',
				props: {
					resetgrid : {
						type : Boolean,
						default : false,
					},
				},
				data : function() {
					return {
						loading : false,
						ready: false,
					}
				},
				computed: {
					setGridSize: function(){
						if(this.resetgrid){
							return 'col-sm-12 col-md-12 col-lg-12';
						}
					}
				},
				methods : {

				},
				mounted : function() {
					this.ready = true;
				},
			});
		</script>
	