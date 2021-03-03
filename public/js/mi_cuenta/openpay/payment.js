class Payment {

    constructor() {

        this.titular                    = document.getElementById('nombreCompleto');
        this.expireYear                 = document.getElementById('year_expiration');
        this.expireMonth                = document.getElementById('month_expiration');
        this.cvv                        = document.getElementById('cvv');
        this.numberCard                 = document.getElementById('numeroTarjeta');
        this.token                      = '';
        this.deviceSessionId            = '';
        this.btnPayment                 = document.getElementById('btnPayment');
        this.inputTokenHidden           = document.getElementById('inputTokenHidden');
        this.inputdeviceSessionIdHidden = document.getElementById('inputDeviceSessionIdHidden');
        this.form                       = document.getElementById('formPay');

        this.initOpenPay();
        this.buildEvents();
    }


    initOpenPay() {

        let openPayId = 'mjduzm7yywiitjzqedrk';
        let openPayPublicKey = 'pk_44e27df5056b4f039e6b2f8e5fbf15d3';

        OpenPay.setId(openPayId);
        OpenPay.setApiKey(openPayPublicKey);
        OpenPay.setSandboxMode(true);
        this.deviceSessionId = OpenPay.deviceData.setup();
    }

    buildEvents() {
        this.btnPayment.addEventListener('click', () => {
            this.pay();
        });
    }

    pay() {
        show_loading();
        OpenPay.token.create({
            "holder_name": this.titular.value,
            "card_number": this.numberCard.value,
            "cvv2": this.cvv.value,
            "expiration_month":this.expireMonth.value,
            "expiration_year": this.expireYear.value
        }, (response) => {
                this.token                            = response.data.id;
                this.inputTokenHidden.value           = this.token;
                this.inputdeviceSessionIdHidden.value = this.deviceSessionId;
                this.form.submit();
        }, (error) => {
            console.log(error);
        });

    }



}