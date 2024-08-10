<style>
    .product-img{
        height: 60px;
        width: 60px;
        object-fit: contain;
        background: white;
    }
    tbody tr{
        transition: 50ms;
    }
    tbody tr:hover{
        cursor: pointer;
       
    }
    .sorting_1{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    td{
       text-align:  left;
    }
    .stock_number{
        padding: 0px 10px 0px 10px;
        width: 20px;
        box-sizing: content-box;
        border: none;
        outline: none;
        text-align: center;
    }

</style>


<style>
    input[type="file"] {
        display: none;
    }

    #btn_upload {
        display: block;
        position: relative;
        color: #ffffff;
        font-size: 18px;
        text-align: center;
        margin: auto;
        border-radius: 5px;
        cursor: pointer;
    }

    .container p {
        text-align: center;
        margin: 20px 0 30px 0;
    }

    #images {
        width: 90%;
        position: relative;
        margin: auto;
        display: flex;
        justify-content: space-evenly;
        gap: 20px;
        flex-wrap: wrap;
    }
    #userImage{
        width: 200%;
        height: auto;
    }

    figure {
        width: 45%;
    }

    img {
        width: 100%;
        border-radius: 50%;
    }

    figcaption {
        text-align: center;
        font-size: 2.4vmin;
        margin-top: 0.5vmin;
    }
</style>