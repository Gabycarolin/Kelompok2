package com.example.futsalbismillah.adapter;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.futsalbismillah.AppController;
import com.example.futsalbismillah.Booking;
import com.example.futsalbismillah.MainActivity;
import com.example.futsalbismillah.Preferences;
import com.example.futsalbismillah.R;
import com.example.futsalbismillah.Tersedia;
import com.example.futsalbismillah.homeActivity;
import com.example.futsalbismillah.model.FutsalModel;
import com.example.futsalbismillah.model.Lapangan_Model;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import androidx.recyclerview.widget.RecyclerView;

public class Adapter_Lapangan extends RecyclerView.Adapter<Adapter_Lapangan.ViewHolder>  {
    private ArrayList<Lapangan_Model> listdata;
    private Activity activity;
    private Context context;
    String edit,hapus, detail;
    public Adapter_Lapangan(Activity activity, ArrayList<Lapangan_Model> listdata, Context context) {
        this.listdata = listdata;
        this.activity = activity;
        this.context = context;
    }

    @Override
    public Adapter_Lapangan.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.list_lapangan, parent, false);
        Adapter_Lapangan.ViewHolder vh = new Adapter_Lapangan.ViewHolder(v);
        return vh;
    }
    @Override
    public void onBindViewHolder(Adapter_Lapangan.ViewHolder holder, int position) {
        Lapangan_Model md = listdata.get(position);
        holder.kode.setText(listdata.get(position).getKode());
        holder.nama.setText(listdata.get(position).getNama_lapangan());
        holder.harga.setText(listdata.get(position).getNama_lapangan());
        holder.kode.setVisibility(View.GONE);
        holder.tanggal = listdata.get(position).getTanggal();
        holder.waktu_mulai = listdata.get(position).getWaktu_mulai();
        holder.durasi = listdata.get(position).getDurasi();
        holder.id_futsal = listdata.get(position).getId_futsal();
        holder.mContext = context;
        holder.detailStatus = detail;
    }
    @Override
    public int getItemCount() {
        return listdata.size();
    }
    public static class ViewHolder extends RecyclerView.ViewHolder {
        private TextView kode, nama, harga;
        String detailStatus;
        Context mContext;
        String tanggal = "", waktu_mulai = "", durasi = "", id_futsal = "";
        public ViewHolder(View v) {
            super(v);
            kode=(TextView)v.findViewById(R.id.kode);
            nama=(TextView)v.findViewById(R.id.nama);
            harga=(TextView)v.findViewById(R.id.harga);
            v.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(final View v) {

                    new AlertDialog.Builder(v.getContext())
                            .setIcon(R.drawable.bgicon)
                            .setTitle("Pesan Lapangan")
                            .setMessage("Apakah Anda Yakin Ingin Pesan Lapangan Ini ?")
                            .setPositiveButton("Ya", new DialogInterface.OnClickListener() {
                                @Override
                                public void onClick(DialogInterface dialog, int which) {
                                    pesan(v.getContext());
                                }
                            })
                            .setNegativeButton("Tidak", null)
                            .show();
//                    try {
//                        Intent intent;
//                        intent = new Intent(v.getContext(), Booking.class);
//                        intent.putExtra("kode", kode.getText().toString());
//                        v.getContext().startActivity(intent);
//                    } catch (Exception e) {
//                        Log.d("pesan", "error");
//                    }
                }
            });
        }
        public void pesan(final Context context){
            StringRequest senddata = new StringRequest(Request.Method.POST, "http://192.168.1.68/Kelompok2/api/Booking", new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    JSONArray res = null;
                    context.startActivity(new Intent(context, MainActivity.class));
                }
            },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
//                            Toast.makeText(context, "Data Kosong", Toast.LENGTH_SHORT).show();
                            Log.d("volley", "errornya : " + error.getMessage());
                        }
                    }){
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
//                    Intent data = getIntent();
                    params.put("id_futsal", id_futsal);
                    params.put("id_lapangan", kode.getText().toString());
                    params.put("tanggal", tanggal);
                    params.put("durasi", durasi);
                    params.put("jam_mulai", waktu_mulai);
                    params.put("username", Preferences.getKeyUsernameSedangLogin(context));
                    params.put("id_cust", "1");


                    Log.d("id_futsal", id_futsal);
                    Log.d("id_lapangan", kode.getText().toString());
                    Log.d("tanggal", tanggal);
                    Log.d("jam_mulai", waktu_mulai);
                    Log.d("username", Preferences.getKeyUsernameSedangLogin(context));
                    Log.d("id_cust", "1");
                    Log.d("durasi", durasi);
                    return params;
                }
            };;
            AppController.getInstance().addToRequestQueue(senddata);
        }

    }
}

