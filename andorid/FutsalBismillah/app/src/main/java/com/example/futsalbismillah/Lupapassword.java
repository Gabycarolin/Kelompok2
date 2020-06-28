package com.example.futsalbismillah;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.media.session.MediaSessionManager;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.textfield.TextInputEditText;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Lupapassword extends AppCompatActivity {
    TextInputEditText Email;
    TextView Pesan;
    Button kembali,submit;
    Boolean cek;
    String EmailHolder;
    ProgressDialog progressDialog;
    RequestQueue requestQueue;
    String Url =  "http://192.168.1.68/siballuhuy/api/auth/lupa";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lupapassword);

        requestQueue = Volley.newRequestQueue(Lupapassword.this);
        progressDialog= new ProgressDialog( Lupapassword.this);
        Email = findViewById(R.id.Email);
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
//                cekForm ();
//                if (cek){
                    kirimEmail(Email.getText().toString());
//                }else{
//                    Pesan.setText("Harap diisi");
//                }
            }
        });


        }
//        public void cekForm()
//        {EmailHolder= Email.getText().toString().trim();
//        if (TextUtils.isEmpty(EmailHolder))
//        {
//            cek = false;
//        }else {
//            cek= true;
//        }
//
//    }
    public void kirimEmail(final String email)
    {
        progressDialog.setMessage("Tunggu sebentar");
        progressDialog.show();

        Log.d("pesan", "berhasil "+email);

        StringRequest senddata = new StringRequest(Request.Method.POST, Url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject res = new JSONObject(response);
                    progressDialog.dismiss();
                    if(res.getString("success").equals("1")){
//                        JSONObject respon = res.getJSONObject("message");
//                        Toast.makeText(Lupapassword.this,
//                                "Silahkan Cek Email Anda Untuk Reset Password", Toast.LENGTH_SHORT)
//                                .show();
                        Intent intent = new Intent(Lupapassword.this, Ubahpassword.class);
                        startActivity(intent);

                    }else{
                        Toast.makeText(getBaseContext(), res.getString("message"), Toast.LENGTH_SHORT).show();

                    }

                } catch (JSONException e) {
                    progressDialog.dismiss();
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                progressDialog.dismiss();
                Log.e("errornyaa ", "" + error);
                Toast.makeText(getBaseContext(), "Email Tidak Terdaftar, "+error, Toast.LENGTH_SHORT).show();


            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("email_cust", email);
                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(senddata);
    }

}

