// Set up the chart
async function getData(url) {
    const response = await axios.get(url);
    return response.data;
  }

async function DataProduct() {
    try {
      const dataCate = await getData("handleCategories/get");
      const dataProduct =await getData("DataProduct/ApiProduct");
   
       
        showStatistical(dataCate,dataProduct)
    } catch (error) {
      console.log(error);
    }
  }
 

  function showStatistical(dataCate,dataProduct){
 
    const categories_name=[]
    // const quantity_product=[]
    const count = {};
 
    dataCate.forEach(item => {
        categories_name.push(item.cat_name);
    });
   
    const data_id_cate=dataCate.map(item => {
        return item.cat_id
    });
    let new_data = dataProduct.reduce((ar, obj) => {
      let bool = false;
      if (!ar) {
        ar = [];
      }
      ar.forEach((a) => {
       
        if (a.cat_id === obj.cat_id) {
          a.quantity++;
          bool = true;
        }
      });
      if (!bool) {
        obj.quantity = 1;
        ar.push(obj);
      }
      return ar;
    }, []);
    
    const quantity_product=new_data.map(item=>{
     
      return [item.cat_name,item.quantity]
        
    })

    //lấy ra cate_id của từng sản phẩm
    // let arr_cate_id_product=dataProduct.map(item=>{
    //     return item.cat_id
    // })
  
    // arr_cate_id_product.forEach((element,index) => {
    //     if(data_id_cate[index]){
    //         count[data_id_cate[index]]=0;
    //     }
   
    //   count[element] = (count[element] || 0) + 1;
        
    // });
    // for (key in count ) {
    //   quantity_product.push(count[key])
    // }
   
    Highcharts.chart('container', {
      chart: {
        type: 'pie',
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
        }
      },
      title: {
        text: 'Tỉ lệ hàng hóa'
      },
      subtitle: {
        text: ''
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          depth: 35,
          dataLabels: {
            enabled: true,
            format: '{point.name}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Share',
        data: quantity_product
      }]
    });

    // const chart = new Highcharts.Chart({
    //     chart: {
    //       renderTo: 'container',
    //       type: 'column',
    //       options3d: {
    //         enabled: true,
    //         alpha: 15,
    //         beta: 15,
    //         depth: 50,
    //         viewDistance: 25
    //       }
    //     },
    //     xAxis: {
          
    //       categories: categories_name
    //     },
    //     yAxis: {
    //       title: {
    //         enabled: false
    //       }
    //     },
    //     tooltip: {
    //       headerFormat: '<b>{point.key}</b><br>',
    //       pointFormat: 'Số sản phẩm: {point.y}'
    //     },
    //     title: {
    //       text: 'Thống kê số sản phẩm của cửa hàng'
    //     },
       
    //     legend: {
    //       enabled: false
    //     },
    //     plotOptions: {
    //       column: {
    //         depth: 25
    //       }
    //     },
    //     series: [
    //         {
    //          name: 'Quantity Proudct',
    //       data: quantity_product,
    //       colorByPoint: true,
    //       stack: 'Toyota'
    //     }
    // ]
    //   });
      
  }

  function start(){
    DataProduct() 
  }
  start()
//   function showValues() {
//     document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
//     document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
//     document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
   
//   }
  
  // Activate the sliders
//   document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
    
//     chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
//     showValues();
//     chart.redraw(false);
//   }));

//   showValues();