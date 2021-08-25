<template>
    <div class="d-flex flex-column align-items-center">
        <h2 class="text-center text-white counter-value text-heebo" style="">+{{showPrice(getCounterValue(counterValue))}}</h2>
        <h6 class="text-center mt-2 text-sm text-white text-ws counter-label" style="">{{counter.label}}</h6>
    </div>
</template>

<script>
export default {
    props:["counter"],

    data(){
        return{
            counterValue:0
        }
    },

    mounted(){
        this.increaseCounter()
    },

    methods:{

        showPrice(price){
          return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },

        increaseCounter(){
            let counterInterval= setInterval(() => {
                let limitVal=this.counter.value.match(/\d+/)[0];
                this.counterValue+=limitVal*0.02
                if(this.counterValue>=limitVal) {
                    return clearInterval(counterInterval);
                }
            }, 20);
        },

        getCounterValue(counter){
            let num=counter
            return parseInt(num); // if value < 1000, nothing to do
            if(num > 999 && num < 1000000){
                return (num/1000).toFixed(0) + 'K'; // convert to K for number from > 1000 < 1 million 
            }else if(num > 1000000){
                return (num/1000000).toFixed(0) + 'M'; // convert to M for number from > 1 million 
            }else if(num < 900){
                return parseInt(num); // if value < 1000, nothing to do
            }
        }
    }
}
</script>