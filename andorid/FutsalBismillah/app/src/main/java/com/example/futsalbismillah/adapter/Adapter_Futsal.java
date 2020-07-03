package com.example.futsalbismillah.adapter;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.futsalbismillah.Booking;
import com.example.futsalbismillah.R;
import com.example.futsalbismillah.model.FutsalModel;

import java.util.ArrayList;

import androidx.recyclerview.widget.RecyclerView;

public class Adapter_Futsal extends RecyclerView.Adapter<Adapter_Futsal.ViewHolder>  {
    private ArrayList<FutsalModel> listdata;
    private Activity activity;
    private Context context;
    String edit,hapus, detail;
    public Adapter_Futsal(Activity activity, ArrayList<FutsalModel> listdata, Context context) {
        this.listdata = listdata;
        this.activity = activity;
        this.context = context;
    }

    @Override
    public Adapter_Futsal.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.list_futsal, parent, false);
        Adapter_Futsal.ViewHolder vh = new Adapter_Futsal.ViewHolder(v);
        return vh;
    }
    @Override
    public void onBindViewHolder(Adapter_Futsal.ViewHolder holder, int position) {
        FutsalModel md = listdata.get(position);
        holder.kode.setText(listdata.get(position).getKode());
        holder.nama.setText(listdata.get(position).getNama_futsal());
        holder.alamat.setText(listdata.get(position).getAlamat());
        holder.telp.setText(listdata.get(position).getTelp());
        holder.kode.setVisibility(View.GONE);
        holder.mContext = context;
        holder.detailStatus = detail;
    }
    @Override
    public int getItemCount() {
        return listdata.size();
    }
    public static class ViewHolder extends RecyclerView.ViewHolder {
        private TextView kode, nama, alamat, telp;
        String detailStatus;
        Context mContext;
        public ViewHolder(View v) {
            super(v);
            kode=(TextView)v.findViewById(R.id.kode);
            nama=(TextView)v.findViewById(R.id.nama);
            alamat=(TextView)v.findViewById(R.id.alamat);
            telp = (TextView)v.findViewById(R.id.telp);
            v.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    try {
                        Intent intent;
                        intent = new Intent(v.getContext(), Booking.class);
                        intent.putExtra("kode", kode.getText().toString());
                        v.getContext().startActivity(intent);
                    } catch (Exception e) {
                        Log.d("pesan", "error");
                    }
                }
            });
        }
    }
}

