async function getCurrentLocationPosition(){


    //Request the user's location
    await navigator.geolocation.getCurrentPosition(async function (position) {
        var loc ={
            latitude:position.coords.latitude,
            longitude:position.coords.longitude};

        return loc;

    });
}

function getCurrentLocationObj(){

    return new Promise((resolve,reject)=>{

        navigator.geolocation.getCurrentPosition(async function (position) {
            var loc ={
                latitude:position.coords.latitude,
                longitude:position.coords.longitude};

            $.ajax({
                url:`http://dev.virtualearth.net/REST/v1/Locations/${loc.latitude},${loc.longitude}?&key=AiEtnEasbmcrJI48BN9-VlE5mvZoZapqR1VpSHZBUmUYtFFU-gunpU6A7OU7m0_f`,
                success:(result=>{
                    let address= result.resourceSets[0].resources[0].address;
                    let addressObj= {
                        district:address.adminDistrict,
                        country:address.countryRegion,
                        addressFormat:address.formattedAddress,
                        locality:address.locality,
                        postalCode:address.postalCode,
                        simpleFormat:address.adminDistrict+", "+address.countryRegion
                    }
                    resolve(addressObj);
                }),
                error:(error=>{
                    console.error(error);
                    reject(error);
                })
            });

        });

    })



}


function getLocationObjByPoint(loc){
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:`http://dev.virtualearth.net/REST/v1/Locations/${loc.latitude},${loc.longitude}?&key=AiEtnEasbmcrJI48BN9-VlE5mvZoZapqR1VpSHZBUmUYtFFU-gunpU6A7OU7m0_f`,
            success:(result=>{
                let address= result.resourceSets[0].resources[0].address;
                let addressObj= {
                    district:address.adminDistrict,
                    country:address.countryRegion,
                    addressFormat:address.formattedAddress,
                    locality:address.locality,
                    postalCode:address.postalCode,
                    simpleFormat:address.adminDistrict+", "+address.countryRegion
                }
                resolve(addressObj);
            }),
            error:(error=>{
                console.error(error);
                reject(error);
            })
        });
    })
}



function locationSearch(searchString){
    return new Promise((resolve,reject)=>{
        $.ajax({
            url:`http://dev.virtualearth.net/REST/v1/Locations?countryRegion=Bangladesh&q=${searchString}&key=AiEtnEasbmcrJI48BN9-VlE5mvZoZapqR1VpSHZBUmUYtFFU-gunpU6A7OU7m0_f`,
            success:(result=>{
                let points=result.resourceSets[0].resources[0].point.coordinates;
                let loc={
                    latitude:points[0],
                    longitude:points[1]
                }
                getLocationObjByPoint(loc).then(res=>resolve(res)).catch(err=>reject(err));
            }),
            error:(error=>{
                console.error(error);
                reject(error);
            })
        });
    })
}

function appendLocation(location){
    jQuery(".current_location").remove();
    jQuery(".location_holder").append("<span class='current_location'>"+location+"</span>");
}

/*getCurrentLocationObj().then(res=>appendLocation(res.simpleFormat)).catch(err=>console.error(err));*/

/*locationSearch("aturar depo").then(res=>console.log("by address",res)).catch(err=>console.error(err));*/
