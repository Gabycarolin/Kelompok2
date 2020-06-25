package com.example.futsalbismillah;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.media.session.MediaSessionManager;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

public class Lupapassword extends AppCompatActivity {
    EditText Email;
    TextView Pesan;
    Button kembali,submit;
    Boolean cek;
    String EmailHolder;
    ProgressDialog progressDialog;
    RequestQueue requestQueue;
    String Url =  "http://192.168.43.233/siballuhuy/api/auth/lupapassword";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lupapassword);

        requestQueue = Volley.newRequestQueue(Lupapassword.this);
        progressDialog= new ProgressDialog( Lupapassword.this);
        Email = findViewById(R.id.email);
        submit = findViewById(R.id.submit);
        kembali = findViewById(R.id.kembali);
        Pesan = findViewById(R.id.pesan);

        kembali.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Lupapassword.this, loginActivity.class);
                startActivity(intent);
            }
        });

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                cekForm ();
                if (cek){
                    kirimEmail();
                }else{
                    Pesan.setText("Harap diisi");
                }
            }
        });


        }
        public void cekForm()
        {EmailHolder= Email.getText().toString().trim();
        if (TextUtils.isEmpty(EmailHolder))
        {
            cek = false;
        }else {
            cek= true;
        }

    }
    public void kirimEmail()
    {
        progressDialog.setMessage("Tunggu sebentar");
        progressDialog.show();
    }

}

