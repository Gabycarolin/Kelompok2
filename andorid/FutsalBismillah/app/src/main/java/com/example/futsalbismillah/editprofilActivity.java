package com.example.futsalbismillah;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Base64;
import java.util.HashMap;
import java.util.Map;

import androidx.appcompat.app.AppCompatActivity;

public class editprofilActivity extends AppCompatActivity {
    private EditText nama, alamat, email, telp, username, password;
    private Button simpan, batal;
    private static String URL_EDIT ="http://192.168.1.68/siballuhuy/api/customer/edit";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_editprofil);
        nama = findViewById(R.id.editnama);
        alamat = findViewById(R.id.editalamat);
        email = findViewById(R.id.editemail);
        telp = findViewById(R.id.edittelp);
        username = findViewById(R.id.editusername);
        password = findViewById(R.id.editpassword);
        simpan = findViewById(R.id.simpan);
        batal = findViewById(R.id.batal);

        getuserdetail();
        batal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //
            }
        });

        simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //
            }
        });
    }

    private void getuserdetail(){
        Log.d("pesan", "idnya "+Preferences.getId(getBaseContext()));
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL_EDIT+"/"+Preferences.getId(getBaseContext()),
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            JSONObject data = jsonObject.getJSONObject("data");

                            nama.setText(data.getString("nama_cust"));
                            alamat.setText(data.getString("nama_cust"));
                            email.setText(data.getString("email_cust"));
                            telp.setText(data.getString("telp_cust"));
                            password.setText(data.getString("password_cust"));
                            username.setText(data.getString("username_cust"));

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(editprofilActivity.this,"error", Toast.LENGTH_SHORT).show();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(editprofilActivity.this, "error" + error.toString(), Toast.LENGTH_SHORT).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    @Override
    protected void onResume() {
        super.onResume();
        getuserdetail();
    }
}
